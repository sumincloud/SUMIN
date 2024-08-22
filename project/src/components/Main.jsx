import React from 'react';
import dummy from './data/academy_list.json';
import './Main.css';



function Main(props) {
  return (
    <main>
      <section>
        <div>
          <div className="card-list-box">
            {dummy.academyList.map(academy=>(
            <div key={academy.class_no}>
              <div className="cart">
                <img src={`${process.env.PUBLIC_URL}/images/heart_w.png`} alt="찜버튼"/>
              </div>
              <a href="#" title="상품">
                <img src={`${process.env.PUBLIC_URL}/images/${academy.thumnail_img}`} alt="상품이미지" />
                <div className="con-text">
                  <p className="con-title">{academy.name}</p>
                  <p className="con-sub">{academy.detail}</p>
                </div>
              </a>
            </div>
            ))}
          </div>
        </div>
      </section>
    </main>
  );
}

export default Main;