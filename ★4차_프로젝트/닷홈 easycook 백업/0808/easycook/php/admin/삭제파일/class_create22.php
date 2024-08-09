<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>강의등록 | 이지쿡</title>

  <?php
  include('header.php');
  ?>
<main>
  <section class="class_size class_create m-center m-auto mb-5">
    <p><a href="index.php">홈</a> &#x003E; 강의 관리 &#x003E; <span style="font-weight:bold">강의 개설</span></p>
    <h2 class="text-center mt-5 mb-5">강의 개설</h2>
    <form action="class_create_input.php" method="post" name="강의 개설하기">
    <article>
      <h3>강의 요약</h3>
      <table class="table">
        <caption>강의요약</caption>
<!-- teacher_code -->
        <input type="hidden" name="teacher_code" id="teacher_code" value="<?php echo $userid;?>">
<!-- teacher name -->
        <input type="hidden" name="teacher_name" id="teacher_name" value="<?php echo $username;?>">
        <tr>
          <td>과목명</td>
          <td colspan="3"><input type="text" name="name" id="name" class="form-control"></td>
        </tr>
        <tr>
          <td>과정명</td>
          <td>
            <select name="category1" id="category1" class="form-control">
              <option value="">과정명 선택</option>
              <option value="한식조리기능사">한식조리기능사</option>
              <option value="양식조리기능사">양식조리기능사</option>
              <option value="일식조리기능사">일식조리기능사</option>
              <option value="중식조리기능사">중식조리기능사</option>
              <option value="제과제빵">제과제빵</option>
              <option value="바리스타">바리스타</option>
            </select>
          </td>
          <td>차수</td>
          <td>
            <select name="nth" id="nth" class="form-control">
              <option value="">차수 선택</option>
              <option value="1">1차</option>
              <option value="2">2차</option>
              <option value="3">3차</option>
              <option value="4">4차</option>
              <option value="5">5차</option>
              <option value="6">6차</option>
              <option value="7">7차</option>
              <option value="8">8차</option>
              <option value="9">9차</option>
              <option value="10">10차</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>구분</td>
          <td>
            <select name="category2" id="category2" class="form-control">
              <option value="">구분 선택</option>
              <option value="국비">국비</option>
              <option value="일반">일반</option>
              <option value="창업">창업</option>
              <option value="취미">취미</option>
              <option value="자격증">자격증</option>
            </select>
          </td>
          <td>카테고리</td>
          <td>
            <select name="category3" id="category3" class="form-control">
              <option value="">카테고리 선택</option>
              <option value="평일">평일</option>
              <option value="주말">주말</option>
              <option value="여름학기">여름학기</option>
              <option value="원데이">원데이</option>
            </select>
          </td>
        </tr> 
        <tr>
          <td>장소</td>
          <td><input type="text" class="form-control" value="서울시 강남구 00로 00빌딩 3층, 이지쿡" name="place" id="place"></td>
          <td>시작일</td>
          <td><input type="date" name="start_date" id="start_date" class="form-control"></td>
        </tr>
        <tr>
          <td>연락처</td>
          <td><input type="text" class="form-control" name="phone" id="phone"></td>
          <td>종료일</td>
          <td><input type="date" name="end_date" id="end_date" class="form-control"></td>
        </tr>
        <tr>
          <td>난이도</td>
          <td>
            <select name="grade" id="grade" class="form-control">
              <option value="">난이도 선택</option>
              <option value="상">상</option>
              <option value="중상">중상</option>
              <option value="중">중</option>
              <option value="중하">중하</option>
              <option value="하">하</option>
            </select>
          </td>
          <td>시작시간</td>
          <td><input type="time" name="start_time" id="start_time" class="form-control"></td>
        </tr>
        <tr>
          <td>정원</td>
          <td><input type="number" name="member_num" id="member_num" class="form-control"></td>
          <td>종료시간</td>
          <td><input type="time" name="end_time" id="end_time" class="form-control"></td>
        </tr>
      </table>
    </article>
    <article>
      <h3>강의정보</h3>
      <div>
        <input type="file" name="thumnail_img" id="thumnail_img">
        <p>강의를 잘 표현 하는 사진을 첨부하여 주십시오(필수사항)</p>
      </div>
      <div>
        <input type="file" name="img" id="img">
        <p>강의 설명은 이미지로 첨부하여 주십시오. (필수사항)</p>
      </div>
      <div>
        <textarea name="detail" id="detail" cols="30" rows="10" placeholder="추가 설명"></textarea>
        <p>강의에 대한 부가 설명을 작성해 주십시오. (선택사항)</p>
      </div>
    </article>
    <a href="class.php" title="강의목록으로" class="btn">강의목록</a>
    <input type="reset" value="초기화" class="btn">
    <input type="submit" value="강의등록" class="btn">
    </form>
  </section>
</main>
<?php
  include('footer.php');
  ?>
</body>
</html>