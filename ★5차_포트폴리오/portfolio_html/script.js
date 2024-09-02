var Mathutils = {
  normalize: function(value, min, max) {
    return (value - min) / (max - min);
  },
  interpolate: function(normValue, min, max) {
    return min + (max - min) * normValue;
  },
  map: function(value, min1, max1, min2, max2) {
    if (value < min1) value = min1;
    if (value > max1) value = max1;
    return this.interpolate(this.normalize(value, min1, max1), min2, max2);
  }
};

// Create renderer
var renderer = new THREE.WebGLRenderer({ canvas: document.querySelector("canvas"), antialias: true });
renderer.setSize(window.innerWidth, window.innerHeight);

// Create scene
var scene = new THREE.Scene();
scene.fog = new THREE.Fog(0x194794, 0, 1000);

// Create camera
var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
camera.position.set(0, 50, 200);

// Create light
var light = new THREE.PointLight(0xffffff, 1, 1000);
light.position.set(50, 100, 50);
scene.add(light);

// Function to create a room with a hole
function createRoomWithHole(size, holeSize) {
  // Create the room geometry
  var roomGeometry = new THREE.BoxGeometry(size, size, size);

  // Create a geometry for the hole
  var holeGeometry = new THREE.CylinderGeometry(holeSize, holeSize, size * 2, 32);
  holeGeometry.rotateX(Math.PI / 2);
  holeGeometry.translate(0, 0, size / 2);

  // Create a buffer geometry for the hole
  var bufferGeometry = new THREE.BufferGeometry();
  var vertices = new Float32Array([
    -size / 2, -size / 2, -size / 2, // Corner 1
    size / 2, -size / 2, -size / 2,  // Corner 2
    size / 2, size / 2, -size / 2,   // Corner 3
    -size / 2, size / 2, -size / 2,  // Corner 4
    -size / 2, -size / 2, size / 2,  // Corner 5
    size / 2, -size / 2, size / 2,   // Corner 6
    size / 2, size / 2, size / 2,    // Corner 7
    -size / 2, size / 2, size / 2    // Corner 8
  ]);

  var indices = [
    0, 1, 2, 0, 2, 3, // Front face
    4, 5, 6, 4, 6, 7, // Back face
    0, 1, 5, 0, 5, 4, // Bottom face
    2, 3, 7, 2, 7, 6, // Top face
    0, 3, 7, 0, 7, 4, // Left face
    1, 2, 6, 1, 6, 5  // Right face
  ];

  bufferGeometry.setAttribute('position', new THREE.BufferAttribute(vertices, 3));
  bufferGeometry.setIndex(indices);

  var roomMaterial = new THREE.MeshPhongMaterial({
    color: 0x00ff00,
    side: THREE.BackSide,
    emissive: 0x00ff00,
    specular: 0x111111
  });

  var room = new THREE.Mesh(bufferGeometry, roomMaterial);

  // Create a mesh for the hole
  var holeMesh = new THREE.Mesh(holeGeometry, roomMaterial);
  holeMesh.position.set(0, 0, size / 2);

  // Combine the room and the hole
  var resultRoom = new THREE.Group();
  resultRoom.add(room);
  resultRoom.add(holeMesh);

  return resultRoom;
}

// Create rooms with holes
var room1 = createRoomWithHole(500, 50);
scene.add(room1);

var room2 = createRoomWithHole(500, 50);
room2.position.set(500, 0, 0);
scene.add(room2);

// Particle system
var particleCount = 6800;
var particles = new THREE.BufferGeometry();
var positions = new Float32Array(particleCount * 3);
var pMaterial = new THREE.PointsMaterial({
  color: 0xFFFFFF,
  size: 0.5,
  map: new THREE.TextureLoader().load('https://s3-us-west-2.amazonaws.com/s.cdpn.io/68819/spikey.png'),
  transparent: true,
  blending: THREE.AdditiveBlending
});

for (var i = 0; i < particleCount; i++) {
  positions[i * 3] = Math.random() * 500 - 250;
  positions[i * 3 + 1] = Math.random() * 500 - 250;
  positions[i * 3 + 2] = Math.random() * 500 - 250;
}

particles.setAttribute('position', new THREE.BufferAttribute(positions, 3));
var particleSystem = new THREE.Points(particles, pMaterial);
scene.add(particleSystem);

// GSAP ScrollTrigger
gsap.registerPlugin(ScrollTrigger);

var cameraTargetPercentage = 0;
var currentCameraPercentage = 0;

gsap.timeline({
  scrollTrigger: {
    trigger: "body",
    start: "top top",
    end: "bottom bottom",
    scrub: 1
  }
}).to({ percent: 0 }, {
  percent: 1,
  ease: "linear",
  onUpdate: function () {
    cameraTargetPercentage = this.targets()[0].percent;
  }
});

// Update camera position based on percentage
function updateCameraPosition() {
  var distance = 200;
  var angle = cameraTargetPercentage * 2 * Math.PI;
  camera.position.x = Math.sin(angle) * distance;
  camera.position.z = Math.cos(angle) * distance;
  camera.lookAt(scene.position);
}

// Render loop
function render() {
  updateCameraPosition();

  particleSystem.rotation.y += 0.0001;

  renderer.render(scene, camera);
  requestAnimationFrame(render);
}
render();

// Handle window resize
window.addEventListener('resize', function () {
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth, window.innerHeight);
});

// Handle mouse movement
document.addEventListener('mousemove', function (evt) {
  camera.rotation.y = Mathutils.map(evt.clientX, 0, window.innerWidth, -Math.PI, Math.PI);
  camera.rotation.x = Mathutils.map(evt.clientY, 0, window.innerHeight, -Math.PI / 4, Math.PI / 4);
});
