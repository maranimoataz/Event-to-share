<template>
<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      
            <div class="dropdown">
            <span>Mouse over me</span>
            <div class="dropdown-content">
            <p>Hello World!</p>
            </div>
            </div>

      </li>
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      <li class="nav-item">
       
            <div class="dropdown">
            <span>Mouse over me</span>
            <div class="dropdown-content">
            <p>Hello World!</p>
            </div>
            </div>

      </li>
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      <li class="nav-item dropdown">
        
            <div class="dropdown">
            <span>Mouse over me</span>
            <div class="dropdown-content">
            <p>Hello World!</p>
            </div>
            </div>

      </li>
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      <li class="nav-item">
        
        <div class="dropdown">
        <span>Mouse over me</span>
        <div class="dropdown-content">
        <p>Hello World!</p>
        </div>
        </div>

      </li>
    </ul>    
  </div>
</nav>
</div>
</template>
<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>