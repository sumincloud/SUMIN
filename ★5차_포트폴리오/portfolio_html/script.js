var Mathutils = {
  // 값을 0과 1 사이로 정규화하는 함수
  normalize: function($value, $min, $max) {
      return ($value - $min) / ($max - $min);
  },
  // 정규화된 값을 실제 값으로 변환하는 함수
  interpolate: function($normValue, $min, $max) {
      return $min + ($max - $min) * $normValue;
  },
  // 특정 범위의 값을 다른 범위로 매핑하는 함수
  map: function($value, $min1, $max1, $min2, $max2) {
      if ($value < $min1) {
          $value = $min1;
      }
      if ($value > $max1) {
          $value = $max1;
      }
      var res = this.interpolate(this.normalize($value, $min1, $max1), $min2, $max2);
      return res;
  }
};

var markers = [];

// 윈도우 크기 가져오기
var ww = window.innerWidth,
  wh = window.innerHeight;

// var composer, params = {
//   exposure: 1.3,
//   bloomStrength: .9,
//   bloomThreshold: 0,
//   bloomRadius: 0
// };

// WebGL 렌더러 생성
var renderer = new THREE.WebGLRenderer({
  canvas: document.querySelector("canvas"), // 캔버스 선택
  antialias: true,                          // 안티앨리어싱 활성화
  // shadowMapEnabled: true,                   // 그림자 맵 활성화
  // shadowMapType: THREE.PCFSoftShadowMap     // 그림자 맵 타입 설정
});
renderer.setSize(ww, wh); // 렌더러 크기를 윈도우 크기에 맞춤

// 빈 씬(Scene) 생성
var scene = new THREE.Scene();
// scene.fog = new THREE.Fog(0x194794, 0, 100); // 안개 효과 추가

var clock = new THREE.Clock(); // 시계 객체 생성 (애니메이션 타이밍용)

// 퍼스펙티브 카메라 생성
var cameraRotationProxyX = 3.14159; // 카메라의 초기 회전 값 (X축)
var cameraRotationProxyY = 0;       // 카메라의 초기 회전 값 (Y축)

var camera = new THREE.PerspectiveCamera(45, ww / wh, 0.001, 200); // 시야각 45도, 종횡비, 근거리, 원거리 설정
camera.rotation.y = cameraRotationProxyX;
camera.rotation.z = cameraRotationProxyY;

// 카메라 그룹 생성하여 카메라를 그룹에 추가 (카메라 이동과 회전 조작을 위해)
var c = new THREE.Group();
c.position.z = 400; // 그룹의 Z축 위치를 설정 (카메라의 초기 위치)

c.add(camera); // 카메라를 그룹에 추가
scene.add(c);  // 그룹을 씬에 추가

// 렌더 패스 설정 (장면을 렌더링하기 위해 Pass 설정)
var renderScene = new THREE.RenderPass(scene, camera);
var bloomPass = new THREE.UnrealBloomPass(new THREE.Vector2(window.innerWidth, window.innerHeight), 0, 0, 0); // 블룸 효과 추가
bloomPass.renderToScreen = true;
// bloomPass.threshold = params.bloomThreshold;
// bloomPass.strength = params.bloomStrength;
// bloomPass.radius = params.bloomRadius;

// 이펙트 컴포저 설정
composer = new THREE.EffectComposer(renderer);
composer.setSize(window.innerWidth, window.innerHeight);
composer.addPass(renderScene); // 기본 렌더 패스 추가
composer.addPass(bloomPass);   // 블룸 패스 추가

// 직선 경로를 정의하기 위해 LineCurve3 사용
var startPoint = new THREE.Vector3(0, 0, 0);  // 시작점
var endPoint = new THREE.Vector3(100, 0, 0);  // 끝점 (경로의 길이를 조절)

var path = new THREE.LineCurve3(startPoint, endPoint); // 직선 경로 생성

// 네모난 단면을 정의하기 위해 Shape 객체를 생성
const size = 4; // 네모의 한 변의 길이
const shape = new THREE.Shape();
shape.moveTo(-size, -size);
shape.lineTo(size, -size);
shape.lineTo(size, size);
shape.lineTo(-size, size);
shape.lineTo(-size, -size);

// ExtrudeGeometry를 사용하여 네모난 단면을 가진 튜브 생성
const extrudeSettings = {
  steps: 50,          // 경로를 따라 생성될 세그먼트 수
  bevelEnabled: false, // 가장자리 둥글기 비활성화
  extrudePath: path    // 지정된 경로를 따라 튜브 생성
};

const geometry = new THREE.ExtrudeGeometry(shape, extrudeSettings);

// 주황색으로 설정된 단색 재질을 사용하여 메쉬 생성
var material = new THREE.MeshBasicMaterial({
  side: THREE.BackSide, // 메쉬의 뒤쪽 면을 렌더링
  color: 0xffa500       // 주황색
});

// 새롭게 생성한 네모난 튜브 메쉬 추가
var tube = new THREE.Mesh(geometry, material);
scene.add(tube); // 씬에 추가

// 내관에 사용할 wireframe 설정
const innerGeometry = new THREE.ExtrudeGeometry(shape, {
  steps: 50,
  bevelEnabled: false,
  extrudePath: path
});
const geo = new THREE.EdgesGeometry(innerGeometry);

var mat = new THREE.LineBasicMaterial({
  linewidth: 2,
  opacity: .2,
  transparent: 1
});

var wireframe = new THREE.LineSegments(geo, mat);
scene.add(wireframe); // 내관 wireframe을 씬에 추가

// 조명 제거 (기본적으로 MeshBasicMaterial은 조명에 영향을 받지 않음)
// var light = new THREE.PointLight(0xffffff, .35, 4, );
// light.castShadow = true; // 그림자 생성
// scene.add(light);

// 경로의 특정 위치에 따라 카메라와 조명을 업데이트하는 함수
function updateCameraPercentage(percentage) {
  p1 = path.getPointAt(percentage % 1);
  p2 = path.getPointAt((percentage + 0.03) % 3);
  p3 = path.getPointAt((percentage + 0.05) % 1);

  c.position.set(p1.x, p1.y, p1.z); // 카메라의 위치 업데이트
  c.lookAt(p2);                     // 카메라가 볼 위치 설정
  // light.position.set(p2.x, p2.y, p2.z); // 조명의 위치 업데이트 (주석 처리됨)
}

var cameraTargetPercentage = 0;
var currentCameraPercentage = 0;

gsap.defaultEase = Linear.easeNone; // 기본 애니메이션 이징 설정

var tubePerc = {
  percent: 0
}

// ScrollTrigger를 사용한 애니메이션 타임라인 설정
gsap.registerPlugin(ScrollTrigger);

var tl = gsap.timeline({
  scrollTrigger: {
      trigger: ".scrollTarget",   // 스크롤 트리거 대상
      start: "top top",           // 시작점
      end: "bottom 100%",         // 끝점
      scrub: 5,                   // 스크럽 시간
      markers: { color: "white" } // 디버그 마커 색상
  }
});

// 스크롤에 따라 애니메이션이 진행되며, 카메라의 위치를 업데이트
tl.to(tubePerc, {
  percent: .96,
  ease: Linear.easeNone,
  duration: 10,
  onUpdate: function() {
      cameraTargetPercentage = tubePerc.percent;
  }
});

// 씬을 렌더링하는 함수
function render() {
  currentCameraPercentage = cameraTargetPercentage;

  // 카메라 회전 업데이트
  camera.rotation.y += (cameraRotationProxyX - camera.rotation.y) / 15;
  camera.rotation.x += (cameraRotationProxyY - camera.rotation.x) / 15;

  // 카메라와 조명의 위치를 업데이트
  updateCameraPercentage(currentCameraPercentage);

  // 장면을 이펙트 컴포저로 렌더링
  composer.render();

  requestAnimationFrame(render); // 렌더링 반복
}
requestAnimationFrame(render); // 렌더링 시작

// 캔버스를 클릭했을 때 현재 경로의 위치를 마커에 추가
$('canvas').click(function() {
  console.clear();
  markers.push(p1);
  console.log(JSON.stringify(markers));
});

// 윈도우 크기 조정 시 카메라와 렌더러 크기 업데이트
window.addEventListener('resize', function() {
  var width = window.innerWidth;
  var height = window.innerHeight;

  camera.aspect = width / height;
  camera.updateProjectionMatrix();

  renderer.setSize(width, height);
  composer.setSize(width, height);
}, false);

// 파티클 시스템 (옵션)
var spikeyTexture = new THREE.TextureLoader().load('https://s3-us-west-2.amazonaws.com/s.cdpn.io/68819/spikey.png');

var particleCount = 6800,
  particles1 = new THREE.Geometry(),
  particles2 = new THREE.Geometry(),
  particles3 = new THREE.Geometry(),
  pMaterial = new THREE.PointsMaterial({
      color: 0xFFFFFF,
      size: .5,
      map: spikeyTexture,
      transparent: true,
      blending: THREE.AdditiveBlending
  });

// 파티클 생성 (임의의 위치 설정)
for (var p = 0; p < particleCount; p++) {
  var pX = Math.random() * 500 - 250,
      pY = Math.random() * 50 - 25,
      pZ = Math.random() * 500 - 250,
      particle = new THREE.Vector3(pX, pY, pZ);
  particles1.vertices.push(particle);
}

for (var p = 0; p < particleCount; p++) {
  var pX = Math.random() * 500,
      pY = Math.random() * 10 - 5,
      pZ = Math.random() * 500,
      particle = new THREE.Vector3(pX, pY, pZ);
  particles2.vertices.push(particle);
}

for (var p = 0; p < particleCount; p++) {
  var pX = Math.random() * 500,
      pY = Math.random() * 10 - 5,
      pZ = Math.random() * 500,
      particle = new THREE.Vector3(pX, pY, pZ);
  particles3.vertices.push(particle);
}

// 파티클 시스템 생성 및 씬에 추가
var particleSystem1 = new THREE.Points(particles1, pMaterial);
var particleSystem2 = new THREE.Points(particles2, pMaterial);
var particleSystem3 = new THREE.Points(particles3, pMaterial);

scene.add(particleSystem1);
scene.add(particleSystem2);
scene.add(particleSystem3);

// 마우스 움직임에 따른 카메라 회전 업데이트
$(document).mousemove(function(evt) {
  cameraRotationProxyX = Mathutils.map(evt.clientX, 0, window.innerWidth, 3.24, 3.04);
  cameraRotationProxyY = Mathutils.map(evt.clientY, 0, window.innerHeight, -.1, .1);
});
