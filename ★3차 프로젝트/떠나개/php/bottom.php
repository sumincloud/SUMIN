
  <style>
    /* 하단 바텀바 서식 */
    #bottom{
      position: fixed;
      width: 100%;
      bottom: 0;
      border-top: 1px solid #ccc;
      background: #fff;
      z-index: 100;
    }
    #bottom ul{
      display: flex;
      justify-content: space-evenly;
      width: 100%;
      padding: 0;
    }
    #bottom ul li{
      text-align: center;
      width: 60px; height: 60px;
      list-style: none;

      display: flex;
      align-items: center;
      flex-direction: column; /* 세로 배치 */
      justify-content: center; /* 중앙 정렬 */

    }
    #bottom a{
      display: flex;
      flex-direction: column; /* 세로 배치 */
      align-items: center; /* 아이콘과 텍스트를 세로로 중앙 정렬 */
      text-decoration: none;
      width: 100%;
      height: 100%;
      color: #666;
    }
    #bottom ul li i{
      font-size: 1.5rem;
      color: #666;
      margin-bottom: -15px; /* 아이콘과 텍스트 사이에 여백 추가 */
      line-height: 60px;
    }
    #bottom ul li span{
      text-align: center;
      font-size: 12px;
    }
    #bottom ul li:nth-of-type(4){
      border-radius: 50%;
      width: 85px;height: 85px;
      position: fixed;
      bottom: 10px;
      border: 8px solid white;
      background: #F2055C;
      box-shadow: 0 0 10px rgba(0,0,0,0.4);
    }
    #bottom ul li:nth-of-type(4) i{
      color: white;
    }


    #bottom .active{
      color: #F2055C;
    }
  </style>


    <!-- 하단 바텀바 -->
    <nav id="bottom">
      <ul>
        <li>
          <a href="./index.php" title="홈">
            <i class="bi bi-house"></i>
            <span class="">홈</span>
          </a>
        </li>
        <li>
          <a href="#" title="검색">
            <i class="bi bi-search"></i>
            <span>검색</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class=""></i>
          </a>
        </li>
        <li>
          <a href="#" title="내 주변">
            <i class="bi bi-geo-alt-fill"></i>
          </a>
        </li>
        <li>
          <a href="#" title="소통">
            <i class="bi bi-wechat"></i>
            <span>소통</span>
          </a>
        </li>
        <li>
          <a href="./mypage.php" title="마이">
            <i class="bi bi-person"></i>
            <span>마이</span>
          </a>
        </li>
      </ul>
    </nav>

