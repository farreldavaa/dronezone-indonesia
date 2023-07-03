<div id="menuHolder">
    <div role="navigation" class="sticky-top border-bottom border-top" id="mainNavigation">
      <div class="flexMain">
        <div class="flex2">
          <button class="whiteLink siteLink" style="border-right:1px solid #eaeaea" onclick="menuToggle()"><i class="fas fa-clock"></i></i> MENU</button>
        </div>
        <div class="logo" id="siteBrand">
          DRONEZONE
        </div>

        <div class="flex2 text-end d-block d-md-none">
          <button class="whiteLink siteLink"><i class="fas fa-search"></i></button>
        </div>

        <div class="login-container">
          <div class="icon-container">
            <div class="whatsapp">
              <a href="">
              <img src="https://img.icons8.com/ios-glyphs/30/whatsapp.png">
                <img src="https://img.icons8.com/windows/30/whatsapp--v1.png">
              </a>
            </div>
            <div class="email">
              <a href="">
                <img src="https://img.icons8.com/material-rounded/30/new-post.png">
                <img src="https://img.icons8.com/material-outlined/30/new-post.png">
              </a>
            </div>
          </div>
          <button class="whiteLink siteLink" onclick="window.location.href='login'">Login</button>
        </div>
      </div>
    </div>

    <div id="menuDrawer">
      <div class="p-4 border-bottom">
        <div class='row'>
          <div class="col">
            <select class="noStyle">
              <option value="english">English</option>
              <option value="spanish">Indonesia</option>
            </select>
          </div>
          <div class="col text-end ">
            <i class="fas fa-times" role="btn" onclick="menuToggle()"></i>
          </div>
        </div>
      </div>
      <div>
        <a href="{{url('landingpage')}}" class="nav-menu-item"><i class="fas fa-home me-3"></i>Home</a>
        <a href="{{url('droneshop')}}" class="nav-menu-item"><i class="fab fa-product-hunt me-3"></i>Article</a>
        <a href="#" class="nav-menu-item"><i class="fas fa-wrench me-3"></i>Services</a>
        <a href="#" class="nav-menu-item"><i class="fas fa-dollar-sign me-3"></i>Pricing</a>
        <a href="#" class="nav-menu-item"><i class="fas fa-file-alt me-3"></i>Blog</a>
        <a href="#" class="nav-menu-item"><i class="fas fa-building me-3"></i>About Us</a>
      </div>
    </div>
  </div>
