<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status Link Example</title>
    <script>
        function updateLink() {
            // select 요소를 가져옵니다
            var selectElement = document.getElementById('class_status');
            
            // 선택된 option의 value를 가져옵니다
            var selectedValue = selectElement.value;
            
            // 링크 요소를 가져옵니다
            var linkElement = document.getElementById('update_link');
            
            // 링크의 href 속성을 업데이트합니다
            linkElement.href = 'status_update.php?no=<?php echo $db['0'];?>&status=' + encodeURIComponent(selectedValue);
        }

        // 페이지가 로드된 후 이벤트 리스너를 추가합니다
        window.onload = function() {
            // select 요소에 change 이벤트 리스너를 추가합니다
            var selectElement = document.getElementById('class_status');
            selectElement.addEventListener('change', updateLink);

            // 페이지 로드 시에도 링크를 업데이트합니다
            updateLink();
        };
    </script>
</head>
<body>
    <form>
        <select name="class_status" id="class_status" class="form-select">
            <option value="현재강의">현재강의</option>
            <option value="지난강의">지난강의</option>
            <option value="예정강의">예정강의</option>
        </select>
    </form>
    <a href="status_update.php?no=<?php echo $db['0'];?>" id="update_link" title="상태수정" class="admin_btn admin_btn_red">상태수정</a>
</body>
</html>
