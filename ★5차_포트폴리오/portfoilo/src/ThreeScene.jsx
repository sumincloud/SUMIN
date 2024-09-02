// src/ThreeScene.jsx
import React, { useEffect, useRef } from 'react';
import * as THREE from 'three';
import { EffectComposer } from 'three/examples/jsm/postprocessing/EffectComposer';
import { RenderPass } from 'three/examples/jsm/postprocessing/RenderPass';
import { UnrealBloomPass } from 'three/examples/jsm/postprocessing/UnrealBloomPass';
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
import $ from 'jquery';

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);

const ThreeScene = () => {
  const canvasRef = useRef(null);

  useEffect(() => {
    const canvas = canvasRef.current;
    const renderer = new THREE.WebGLRenderer({
      canvas: canvas,
      antialias: true,
      shadowMapEnabled: true,
      shadowMapType: THREE.PCFSoftShadowMap,
    });

    // Get window size
    const ww = window.innerWidth;
    const wh = window.innerHeight;
    renderer.setSize(ww, wh);

    // Create scene and camera
    const scene = new THREE.Scene();
    scene.fog = new THREE.Fog(0x194794, 0, 100);

    const camera = new THREE.PerspectiveCamera(45, ww / wh, 0.001, 200);
    camera.rotation.y = 3.14159;
    camera.rotation.z = 0;

    const c = new THREE.Group();
    c.position.z = 400;
    c.add(camera);
    scene.add(c);

    // Set up render pass
    const renderScene = new RenderPass(scene, camera);
    const bloomPass = new UnrealBloomPass(new THREE.Vector2(window.innerWidth, window.innerHeight), 1.5, 0.4, 0.85);
    bloomPass.renderToScreen = true;
    const composer = new EffectComposer(renderer);
    composer.setSize(window.innerWidth, window.innerHeight);
    composer.addPass(renderScene);
    composer.addPass(bloomPass);

    // Your existing code to create geometries, materials, and objects
    // ...

    // ScrollTrigger and GSAP animations
    const tubePerc = { percent: 0 };
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: ".scrollTarget",
        start: "top top",
        end: "bottom 100%",
        scrub: 5,
        markers: { color: "white" },
      },
    });

    tl.to(tubePerc, {
      percent: 0.96,
      ease: "none",
      duration: 10,
      onUpdate: function () {
        // Your update logic
      },
    });

    // Animation loop
    const render = () => {
      // Your render logic
      composer.render();
      requestAnimationFrame(render);
    };

    requestAnimationFrame(render);

    // Handle window resize
    window.addEventListener('resize', () => {
      const width = window.innerWidth;
      const height = window.innerHeight;
      camera.aspect = width / height;
      camera.updateProjectionMatrix();
      renderer.setSize(width, height);
      composer.setSize(width, height);
    }, false);

    // Mouse move event
    $(document).mousemove((evt) => {
      // Your mouse move logic
    });

    // Click event
    $(canvas).click(() => {
      console.clear();
      // Your click logic
    });

    return () => {
      // Cleanup code (if needed)
    };

  }, []);

  return <canvas ref={canvasRef} />;
};

export default ThreeScene;
