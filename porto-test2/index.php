<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Portofolio 3D Interaktif Lengkap</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>

<div id="container">
  <canvas id="canvas"></canvas>
  <aside id="sidebar">
    <h1>Portofolio 3D</h1>
    <div id="project-info">
      <h2 id="info-title">Hover atau klik sisi kubus</h2>
      <img id="info-img" src="" alt="" />
      <p id="info-desc"></p>
    </div>
    <button id="modeToggle">Mode Gelap</button>
  </aside>
</div>

<div id="modal" class="modal">
  <div class="modal-content">
    <span id="closeBtn" class="close">&times;</span>
    <h2 id="modalTitle"></h2>
    <img id="modalImg" src="" alt="Project Image" />
    <p id="modalDesc"></p>
  </div>
</div>

<script src="libs/dat.gui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.152.2/build/three.min.js"></script>
<script src="main.js"></script>
</body>
</html>
