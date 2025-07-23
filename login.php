<?php
session_start();
include 'koneksi.php';

if($_POST){
  $u = mysqli_real_escape_string($koneksi,$_POST['user']);
  $p = mysqli_real_escape_string($koneksi,$_POST['pass']);
  
  // md5 hash
  $cek = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$u' AND password=md5('$p')");
  
  if(mysqli_num_rows($cek)>0){
    $_SESSION['admin']=$u;
    header('Location: admin/dashboard.php');
    exit;
  } else {
    $error = "Login gagal";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <!-- Tambahkan di <head> jika belum ada -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-200 via-blue-400 to-blue-700">
        <div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-sm">
            <h2 class="text-2xl font-bold text-blue-900 mb-6 text-center">Login Admin</h2>
            <form method="post" class="space-y-4">
                <input type="text" name="user" placeholder="Username" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                <input type="password" name="pass" placeholder="Password" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded font-bold hover:bg-blue-700 transition">Login</button>
            </form>
            <?php if(isset($error)): ?>
                <div class="mt-4 text-red-600 text-center"><?= $error ?></div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
