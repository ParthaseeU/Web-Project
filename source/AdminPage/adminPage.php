<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="stylesheet" href="../stylesheets/common.css">
  <link rel="stylesheet" href="../stylesheets/adminPage/adminPage.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="stylesheet" href="../stylesheets/accountManagementPage/Acc_management.css">
  <link rel="stylesheet" href="../stylesheets/partials/navBar.css">
  <title>Admin Page</title>
</head>

<?php
$page = "dashboardTab";
include '../partials/navBar.php';
?>

<body>
  <div class="main-content">
    <!-- DISPLAYING STATISTICS -->
    <div class="school-stats">
      <?php

      require_once '../connect.php';
      $stmt = $pdo->prepare('SELECT COUNT(StudentID) from student');
      $stmt->execute();
      $_SESSION['StudentCount'] = $stmt->fetch(PDO::FETCH_NUM)[0];

      $stmt = $pdo->prepare('SELECT COUNT(TeacherID) from teacher');
      $stmt->execute();
      $_SESSION['TeacherCount'] = $stmt->fetch(PDO::FETCH_NUM)[0];

      $stmt = $pdo->prepare('SELECT COUNT(UserID) FROM approval WHERE IsApproved=0');
      $stmt->execute();
      $_SESSION['UnapprovedCount'] = $stmt->fetch(PDO::FETCH_NUM)[0];

      $stmt = $pdo->prepare('SELECT COUNT(UserID) from user');
      $stmt->execute();
      $_SESSION['UserCount'] = $stmt->fetch(PDO::FETCH_NUM)[0];
      ?>

      <div class="stats-container total-unapproved">
        <i class="fa-regular fa-circle-xmark fa-2xl" style="color:#f25356;"></i>
        <div>
          <div><?php echo $_SESSION['UnapprovedCount'] ?></div>
          <div class="stats-information" style="font-size:18px;">Total Unapproved Users</div>
        </div>
      </div>

      <div class="stats-container total-students">
        <i class="fa-solid fa-graduation-cap fa-2xl" style="color:#7bc7ed;"></i>
        <div>
          <div><?php echo $_SESSION['StudentCount'] ?></div>
          <div class="stats-information" style="font-size:20px;">Total Students</div>
        </div>

      </div>

      <div class="stats-container total-teachers">
        <i class="fa-solid fa-chalkboard-user fa-2xl" style="color:#ecdd70;"></i>
        <div>
          <div><?php echo $_SESSION['TeacherCount'] ?></div>
          <div class="stats-information" style="font-size:20px;">Total Teachers</div>
        </div>
      </div>

      <div class="stats-container total-staffs">
        <i class="fa-regular fa-user fa-2xl" style="color:#70ecb2;"></i>
        <div>
          <div><?php echo $_SESSION['UserCount'] ?></div>
          <div class="stats-information" style="font-size:20px;">Total Users</div>
        </div>
      </div>

    </div>
    <!-- DISPLAYING USER CLICKED INFORMATION -->
    <div class="user-information">

      <div class="search-box"></div>
      <div class="user-list-container">
        <!-- DISPLAYING TABLE OF USERS -->
        <table class="user-list">
          <tr>
            <th>ID</th>
            <th>UserType</th>
            <th>Name</th>
            <th>Authorisation</th>
          </tr>
          <?php
          require 'getListUsers.php';
          foreach ($users as $user) {
            echo '<tr>' .
              '<td>' . $user['UserID'] . '</td>' .
              '<td>' . $user['UserType'] . '</td>' .
              '<td>' . $user['Name'] . '</td>' .
              '<td>' . $user['Authorisation'] . '</td>' .
              '</tr>';
          }
          ?>
        </table>
      </div>
    </div>

  </div>

  <script src="../scripts/adminPage.js"></script>
</body>

</html>