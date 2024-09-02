import './App.css';
import './style.css';
import ThreeScene from './ThreeScene';

function App() {
  return (
    <>
      <canvas className="experience"></canvas>
      <div className="scrollTarget"></div>
      <div className="vignette-radial"></div>
      <ThreeScene />
    </>
  );
}

export default App;
