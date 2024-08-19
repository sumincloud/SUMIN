<?php
  include('./php/include/dbconn.php');

    // 세션이 이미 시작되었는지 확인
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
    if (isset($_SESSION['id'])) {
      $id = $_SESSION['id'];
      $name = $_SESSION['name'];
    }else{
      $id = null;
    }

    // question count
    $query = "select count(*) from question WHERE question_id='$id'";
    $result = mysqli_query($conn, $query);
    $max_Num = mysqli_fetch_array($result);

    // 전체 목록의 갯수
    $num = $max_Num[0];
    //한 페이지에 보여질 게시물 개수
    $list_num = 5;    
    //이전, 다음 버튼 클릭시 나오는 페이지 수
    $page_num =3;    
    //현재 페이지
    $page = isset($_GET["page"])? $_GET["page"] : 1;    
    // 전체페이지수 계산
    $total_page = ceil($num / $list_num); 
    //전체블럭 계산
    $total_block = ceil($total_page / $page_num);    
    //현재블럭번호 계산
    $now_block = ceil($page / $page_num);    
    //블럭당 시작페이지 번호$start
    $s_pageNum = ($now_block - 1) * $page_num + 1;    
    //데이터가 0인 경우
    if($s_pageNum <= 0){ $s_pageNum = 1; };    
    //블럭당 마지막페이지 번호
    $e_pageNum = $now_block * $page_num;    
    //마지막 번호가 전체 페이지번호보다 크다면 동일한 값을 준다.
    if($e_pageNum > $total_page){ $e_pageNum = $total_page; };

    $start = ($page - 1) * $list_num;
    $cnt = $start + 1;
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>이지쿡 - 이용약관</title>
    <!-- 공통 헤드 정보 삽입 -->
    <?php include('./php/include/head.php'); ?>
    <!-- 메인 스타일 시트 -->
    <link rel="stylesheet" href="./css/main.css">
    <style>
        .inquire_list{
        max-width: 1025px;
        margin: 0 auto;
        padding: 0 20px;
        margin-top: 80px;
        }
        body {
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        main {
            max-width: 1025px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
        font-size: 24px; /* 큰 글씨 크기 */
        font-weight: bold;
        text-align: center; /* 가운데 정렬 */
        margin-bottom: 20px;
        color: #333; /* 색상 조정 */
        border-bottom: 2px solid var(--red);  /* 하단 테두리 */
        padding-bottom: 10px;
        cursor: pointer;
        }

        .tab-content {
            display: none;
            margin-top: 20px;
        }

        .tab-content.active {
            display: block;
        }

        h3 {
            font-size: 18px;
            margin-top: 20px;
            color: var(--red); /* 색상 조정 */
        }

        h4 {
            font-size: 18px;
            margin-top: 10px;
            color: #333;
        }

        p {
            margin: 10px 0;
        }

        ul {
            margin: 10px 0;
            padding-left: 20px;
        }

        li {
            margin-bottom: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        .bread_c {
            margin-bottom: 20px;
            font-size: 1rem;
        }

         /* 탭 헤더 스타일 */
         .tab-headers {
            display: flex;
            align-items: center;
        }
        .tab-headers h3 {
            margin: 0;
            padding: 10px 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-bottom: none;
            text-align: center;
            flex: 1;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .tab-headers h3.active {
            background-color: #e0e0e0;
            border-bottom: 1px solid #ddd;
        }
        .tab-headers h3:not(:last-child) {
            border-right: 1px solid #ddd; /* 헤더 사이에 구분 선 추가 */
        }

        /* 탭 콘텐츠 스타일 */
        .tab-content {
            display: none;
            padding: 20px;
            border: 1px solid #ddd;
            border-top: none;
        }
        .tab-content.active {
            display: block;
        }
    </style>
</head>
<body>
    <!-- 공통 헤더 삽입 -->
    <?php include('./php/include/header.php'); ?>

    <!-- 메인 컨텐츠 -->
    <main class="inquire_list mb-5">
        <p class="bread_c">
            <a href="./index.php" title="홈">홈</a> &#62; 
            <b><a href="./promise.php" title="이용약관">이용약관</a></b>
        </p>
       <h2 class="mt-5">이용약관</h2>
        <!-- 탭컨텐츠 -->
        <div class="tab-headers">
            <h3 id="tab1-header" >회원약관</h3>
            <h3 id="tab2-header">개인정보처리방침</h3>
        </div>
        
        <div id="tab1-content" class="tab-content">
            <!-- 내용 시작 -->
            <h3>제1장 총칙</h3>
            <h4>제1조 [목적]</h4>
            <p>
                본 약관은 (주)EasyCook(이하 "회사"라 합니다)이 <a href="http://www.easycook.ac" title="EasyCook">http://www.easycook.ac</a>, <a href="http://easycook.co.kr" title="EasyCook">http://easycook.co.kr</a> (이하 "웹사이트"라 합니다)를 통해 제공하는 교육 정보 서비스 (이하 "서비스"라 합니다)의 이용에 관한 제반 사항을 규정하는 것을 목적으로 합니다.
            </p>

            <h4>제2조 [정의]</h4>
            <ul>
                <li><strong>"이용자"</strong>라 함은 "웹사이트"에 접속하여 본 약관에 따라 "회사"가 제공하는 "서비스"를 이용하는 "회원" 및 "비회원"을 말합니다.</li>
                <li><strong>"회원"</strong>이라 함은 "웹사이트"에 접속하여 본 약관에 동의함으로써 "아이디"를 부여받은 자로서 "회사"가 제공하는 "서비스"를 지속해서 이용할 수 있는 자를 말합니다.</li>
                <li><strong>"비회원"</strong>이라 함은 "웹사이트"에 접속하였으나 본 약관에 동의하지 않음으로써 "아이디"를 부여받지 못한 자를 말합니다.</li>
                <li><strong>"아이디"</strong>라 함은 "회원"의 식별 및 "서비스" 이용을 위하여 "회원"이 정하고 "회사"가 승인하는 문자 또는 숫자의 조합을 말합니다.</li>
                <li><strong>"개인정보"</strong>라 함은 생존하는 개인에 관한 정보로서 해당 정보에 포함된 성명, 생년월일 등의 사항에 의하여 해당 개인을 식별할 수 있는 정보를 말합니다.</li>
                <li><strong>"게시물"</strong>이라 함은 "이용자"가 "웹사이트"에 게재한 글, 이미지, 각종 파일 및 링크, 각종 댓글 등의 정보를 의미합니다.</li>
            </ul>

            <h4>제3조 [약관의 효력과 변경]</h4>
            <ul>
                <li>본 약관은 "이용자"가 약관의 내용에 동의하며 회원가입을 신청하고, "회사"가 그 신청에 대하여 승낙함으로써 효력이 발생합니다.</li>
                <li>"회사"가 본 약관의 내용을 변경하는 경우 기존 "회원"들에게는 제5조의 방법으로 통지함으로써 효력이 발생합니다.</li>
            </ul>

            <h4>제4조 [약관 외 준칙]</h4>
            <p>
                본 약관 및 "웹사이트"에 명시되지 아니한 사항이 관계 법령 (전기통신기본법, 전기통신사업법, 정보통신망 이용촉진 및 정보보호 등에 관한 법률 기타 관련 법령)에 규정되어 있을 때는 그 규정에 따릅니다.
            </p>

            <h4>제5조 [회원에 대한 통지]</h4>
            <ul>
                <li>"회사"는 "회원"에게 알려야 할 상황이 발생하는 경우 회원가입 시 "회원"이 공개한 전자우편주소로 이메일을 보내거나 "웹사이트"에 공지 또는 팝업창을 게시하는 방법 등으로 통지할 수 있습니다.</li>
                <li>전 항과 같이 통지한 경우 그때부터 14일 이내에 "회원"이 "회사"가 정하는 방법으로 그 통지 내용에 동의하지 않음을 표시하지 않을 경우 그 "회원"에게는 통지 내용이 도달하였고 통지 내용에 동의하였다고 간주합니다.</li>
                <li>통지 내용에 동의하지 아니하는 "회원"은 "회사"에 회원탈퇴를 요청할 수 있습니다. 단, "회사"의 강의를 수강 중인 "회원" 중 통지내용에 동의하지 아니하는 "회원"은 해당 강의와 관련된 "서비스" 이용이 종료될 때까지 기존이 적용됩니다.</li>
            </ul>

            <h3>제2장 회원가입</h3>
            <h4>제6조 [회원가입]</h4>
            <ul>
                <li>회원가입은 "서비스"를 이용하려는 자가 본 약관의 내용에 동의하고 회원가입 신청을 한 후 "회사"가 이러한 신청에 대하여 승낙함으로써 완료됩니다.</li>
                <li>전 항의 규정에 따라 회원가입을 할 때에는 "회사"가 제공하는 "서비스"의 원활한 이용을 위해서 필요한 "개인정보"를 제공해야 합니다.</li>
            </ul>

            <h4>제7조 [회원가입 신청]</h4>
            <ul>
                <li>"회원"으로 가입하여 "서비스"를 이용하기를 희망하는 자는 "회사"가 요청하는 소정의 신규회원가입 양식에서 요구하는 사항을 기록하여 신청합니다.</li>
                <li>온라인 가입신청 양식에 기재하는 사항에 실명이나 실제 정보를 입력하지 않은 신청자는 법적인 보호를 받을 수 없으며, "서비스" 사용의 제한을 받을 수 있습니다.</li>
            </ul>

            <h4>제8조 [회원가입 신청에 대한 승낙]</h4>
            <ul>
                <li>승낙은 "회사"가 신청자에게 "아이디", 서비스 이용개시를 통보함으로써 이루어집니다.</li>
                <li>"회사"는 다음 각 호에 해당하는 경우 회원가입 신청에 대하여 승낙하지 아니합니다.
                    <ul>
                        <li>본인의 실명으로 신청하지 않은 경우</li>
                        <li>다른 사람의 명의를 빌리거나 도용하여 차명으로 신청한 경우</li>
                        <li>회원가입 신청서의 내용을 허위로 기재했거나 첨부한 경우</li>
                        <li>관계 법령에 위배되거나 사회의 안녕질서 혹은 미풍양속을 저해할 수 있는 목적으로 신청한 경우</li>
                        <li>"웹사이트"의 회원을 탈퇴한 후 "웹사이트"에서 정한 일정 기간이 지나지 않은 경우</li>
                        <li>기타 "웹사이트"가 정한 회원가입 신청 요건이 미비한 경우</li>
                    </ul>
                </li>
                <li>회사는 다음 각 호에 해당하는 경우에는 그 사유가 해소될 때까지 승낙을 유보할 수 있습니다.
                    <ul>
                        <li>서비스 관련 설비의 용량이 부족한 경우</li>
                        <li>기술상 또는 업무 수행상 지장이 있는 경우</li>
                        <li>기타 합리적인 이유가 있는 경우로서 회사가 필요하다고 인정하는 경우</li>
                    </ul>
                </li>
            </ul>

            <h4>제9조 [만 14세 미만 아동의 회원가입에 관한 특칙]</h4>
            <ul>
                <li>만 14세 미만의 "이용자"는 "회사"의 "웹사이트"에서 제공되는 개인정보취급방침과 본 약관을 충분히 숙지한 후, 반드시 법정대리인의 동의를 얻어 회원가입을 신청하여야 합니다.</li>
                <li>"회사"는 만 14세 미만의 "이용자"가 회원가입을 신청하는 경우 별도의 안내 또는 절차를 통하여 법정대리인의 동의 여부를 확인할 수 있습니다.</li>
                <li>만 14세 미만의 "이용자"는 "회사"가 법정대리인에게 전 항의 동의사실 여부를 확인할 수 있도록 회원가입 시 법정대리인의 성명, 연락처 등을 제공하여야 합니다.</li>
                <li>"회사"는 법정대리인의 동의에 대한 확인절차를 거치지 않은 만 14세 미만 "이용자"에 대하여는 회원가입을 불허 또는 취소할 수 있습니다.</li>
                <li>만 14세 미만 "회원"의 법정대리인은 자녀에 대한 개인정보의 열람, 정정, 갱신을 요구하거나 회원가입에 대한 동의를 철회할 수 있으며, 이러한 경우에 "회사"는 지체 없이 필요한 조치를 취해야 합니다. 이때 "회사"는 법정대리인임을 입증할 수 있는 문서 등 확인서류의 제출을 요청할 수 있습니다.</li>
            </ul>

            <h3>제3장 온라인 수강신청</h3>
            <p>제10조 [온라인 수강신청] 내용이 이어집니다...</p>
        </div>

        <div id="tab2-content" class="tab-content">
            <h3>개인정보 수집 및 이용에 관한 동의 약관</h3>
            <p>(주)EasyCook (이하 '회사'라 합니다)는 여러분의 개인정보를 중요하게 생각하며, 아래의 내용과 같이 개인정보를 수집하고 이용합니다. 이 약관을 충분히 읽고 이해한 후 동의해 주시기 바랍니다.</p>

            <h4>1. 개인정보의 수집 및 이용 목적</h4>
            <p>회사는 다음의 목적을 위해 개인정보를 수집하고 이용합니다:</p>
            <ul>
                <li>회원가입 및 관리: 회원 가입, 관리, 서비스 제공, 회원 식별, 인증, 회원제 서비스 운영</li>
                <li>강의 수강 및 관리: 수강 신청, 강의 이력 관리, 강의 관련 공지 및 알림</li>
                <li>서비스 제공 및 개선: 서비스 제공, 질의응답, 고객 요청 및 불만 처리, 서비스 개선을 위한 분석</li>
                <li>마케팅 및 광고: 신규 서비스 안내, 맞춤형 광고 및 이벤트 정보 제공, 서비스 관련 통계 분석</li>
            </ul>

            <h4>2. 수집하는 개인정보 항목</h4>
            <p>회사는 다음과 같은 개인정보를 수집합니다:</p>
            <ul>
                <li><strong>필수항목:</strong></li>
                <ul>
                    <li>이름</li>
                    <li>연락처 (휴대전화 번호, 이메일 주소)</li>
                    <li>생년월일</li>
                    <li>주소</li>
                    <li>결제 정보 (신용카드 정보, 계좌 정보 등)</li>
                </ul>
                <li><strong>선택항목:</strong></li>
                <ul>
                    <li>학습 이력</li>
                    <li>선호하는 강의 분야</li>
                    <li>기타 개인 맞춤형 서비스 제공을 위한 정보</li>
                </ul>
            </ul>

            <h4>3. 개인정보의 보유 및 이용 기간</h4>
            <p>회사는 수집한 개인정보를 원칙적으로 이용 목적이 달성된 후에는 지체 없이 파기합니다. 다만, 관계 법령에 의한 정보 보유가 필요한 경우에는 해당 기간 동안 개인정보를 보유합니다.</p>
            <ul>
                <li>회원가입 및 관리: 회원 탈퇴 시까지 또는 법령에 정해진 기간</li>
                <li>서비스 제공 관련: 강의 제공 완료 후 5년</li>
                <li>결제 정보: 결제 후 5년 (세법에 따른 거래 증빙 자료)</li>
            </ul>

            <h4>4. 개인정보의 제3자 제공</h4>
            <p>회사는 개인정보를 제3자에게 제공하지 않습니다. 다만, 다음의 경우에는 예외로 합니다:</p>
            <ul>
                <li>법적 요구: 법령에 의한 요구가 있는 경우</li>
                <li>서비스 제공: 협력업체에게 필요한 범위 내에서 제공 (단, 제공 시 사전 동의 및 보안 조치가 취해집니다)</li>
            </ul>

            <h4>5. 개인정보의 처리 위탁</h4>
            <p>회사는 원활한 서비스 제공을 위해 다음과 같은 업무를 외부에 위탁할 수 있습니다:</p>
            <ul>
                <li>결제 대행사: 결제 처리 및 관련 서비스</li>
                <li>전산 시스템 관리: 서버 운영 및 관리</li>
            </ul>
            <p>회사는 위탁업체에 대해 적절한 보호 조치를 취하며, 위탁 계약 시 개인정보 보호 관련 규정을 명시합니다.</p>

            <h4>6. 개인정보의 열람 및 수정</h4>
            <p>이용자는 언제든지 본인의 개인정보를 열람하고 수정할 수 있습니다. 개인정보 열람 및 수정을 원하실 경우, 고객센터를 통해 요청하시면 됩니다.</p>

            <h4>7. 개인정보 보호를 위한 노력</h4>
            <p>회사는 개인정보 보호를 위해 다음과 같은 조치를 취합니다:</p>
            <ul>
                <li>암호화: 개인정보의 암호화 및 안전한 저장</li>
                <li>접근 제한: 개인정보 접근 권한 제한 및 내부 관리</li>
                <li>정기적인 점검: 보안 점검 및 취약점 분석</li>
            </ul>

            <h4>8. 개인정보 보호책임자</h4>
            <p>회사는 개인정보 보호와 관련된 사항을 아래의 담당자가 책임집니다:</p>
            <ul>
                <li>담당자: [담당자 이름]</li>
                <li>연락처: [전화번호]</li>
                <li>이메일: [이메일 주소]</li>
            </ul>

            <h4>9. 동의 거부 권리</h4>
            <p>이용자는 본 약관에 동의하지 않을 권리가 있으며, 동의하지 않는 경우에는 회원가입 및 일부 서비스 이용에 제한이 있을 수 있습니다.</p>

            <h4>10. 약관의 변경</h4>
            <p>본 약관의 내용은 변경될 수 있으며, 변경 시에는 사전에 공지하거나 통지하여 이용자가 변경된 사항을 인지할 수 있도록 합니다.</p>

            <h4>11. 시행일</h4>
            <p>본 개인정보 수집 및 이용 동의 약관은 2024년 8월 9일부터 시행됩니다.</p>
        </div>
    </main>

    <!-- 공통 푸터 삽입 -->
    <?php include('./php/include/footer.php'); ?>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabHeaders = document.querySelectorAll('h3');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabHeaders.forEach(header => {
                header.addEventListener('click', () => {
                    // Hide all contents
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    // Remove active class from all headers
                    tabHeaders.forEach(h => h.style.backgroundColor = '');
                    
                    // Show the selected content
                    const contentId = header.id.replace('header', 'content');
                    document.getElementById(contentId).classList.add('active');
                    
                    // Highlight the clicked header
                    header.style.backgroundColor = 'var(--admin)';
                });
            });

            // Set default active tab
            tabHeaders[0].click();
        });
    </script>
</body>
</html>
