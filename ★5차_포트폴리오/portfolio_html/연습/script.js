// Utility functions
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

// Get window size
var ww = window.innerWidth,
  wh = window.innerHeight;

// Create a WebGL renderer
var renderer = new THREE.WebGLRenderer({
canvas: document.querySelector("canvas"),
antialias: true
});
renderer.setSize(ww, wh);
renderer.setClearColor(0x000000); // Set the clear color to black for visibility

// Create an empty scene
var scene = new THREE.Scene();

// Create a perspective camera
var camera = new THREE.PerspectiveCamera(75, ww / wh, 0.1, 1000);
camera.position.z = 100; // Move camera further back to see the plane

// Create a simple geometry (plane) as a placeholder
var geometry = new THREE.PlaneGeometry(200, 200);
var material = new THREE.MeshBasicMaterial({ color: 0x00ff00, side: THREE.DoubleSide });
var plane = new THREE.Mesh(geometry, material);
scene.add(plane);

// Simple animation function
function animate() {
requestAnimationFrame(animate);
renderer.render(scene, camera);
}
animate();

// GSAP ScrollTrigger setup
gsap.registerPlugin(ScrollTrigger);

var tl = gsap.timeline({
scrollTrigger: {
  trigger: ".scrollTarget",
  start: "top top",
  end: "bottom bottom",
  scrub: 1
}
});

tl.to(camera.position, {
 z: 0,
 ease: "none",
 duration: 1
});

window.addEventListener('resize', function() {
var width = window.innerWidth;
var height = window.innerHeight;
camera.aspect = width / height;
camera.updateProjectionMatrix();
renderer.setSize(width, height);
});
