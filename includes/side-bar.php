<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="dashboard.php">EDUTORIAL</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="dashboard.php">ET</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="<?= $active_dashboard ?>">
        <a href="dashboard.php" class=""><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Profile</li>
      <li class="dropdown <?= $active_admin ?>">
        <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Admin</span></a>
        <ul class="dropdown-menu">
          <li class="<?= $active_user ?>"><a href="user.php">User</a></li> 
          <li class="<?= $active_author ?>"><a href="author.php">Authors</a></li> 
        </ul>
      </li>
      <li class="menu-header">Pages</li>
      <li class="dropdown <?= $active_article ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i> <span>Articles</span></a>
        <ul class="dropdown-menu">
          <li class="<?= $active_post ?>"><a class="nav-link" href="post.php">Your Post</a></li> 
          <li class="<?= $active_allPost ?>"><a class="nav-link" href="all-post.php">All Article</a></li> 
        </ul>
      </li>
    </ul>
  </aside>
</div>