<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('category.create') }}">
              <i class="bi bi-circle"></i><span>Create</span>
            </a>
          </li>
          <li>
            <a href="{{ route('category.index') }}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav-size" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Size</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav-size" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('size.create') }}">
              <i class="bi bi-circle"></i><span>Create</span>
            </a>
          </li>
          <li>
            <a href="{{ route('size.index') }}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav-product" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav-product" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('product.create') }}">
              <i class="bi bi-circle"></i><span>Create</span>
            </a>
          </li>
          <li>
            <a href="{{ route('product.index') }}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#color-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Color</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="color-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('color.create') }}">
              <i class="bi bi-circle"></i><span>Create</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#color-nav5" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Slider</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="color-nav5" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('slider.create') }}">
              <i class="bi bi-circle"></i><span>Create</span>
            </a>
          </li>
          <li>
            <a href="{{ route('slider.index')}}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
        </ul>
      </li>

      
      <li>
        <a href="{{ route('user.index')}}">
          <i class="bi bi-circle"></i><span>Users</span>
        </a>
      </li>

    </ul>

  </aside>
