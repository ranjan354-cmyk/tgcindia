<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->

  <a href="{{url('')}}" class="brand-link">

    <img src="{{url('assets/front/img/fav.png')}}" alt="TGC" class="brand-image img-circle elevation-3" style="opacity: .8">

    <span class="brand-text font-weight-light">TGC India</span>

  </a>

@php
    $userId = Auth::id();
@endphp



  <!-- Sidebar -->

  <div class="sidebar">

    <!-- Sidebar user (optional) -->

    <div class="user-panel mt-3   d-flex">

      <div class="image">

        <img src="{{url('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">

      </div>

      <div class="info">

        <p class="tt" style="color:white;"> <i style="font-size: 14px; color: green;" class="fa">&#xf111;</i> Admin</p>

      </div>



    </div>

    <!-- SidebarSearch Form -->

    <!-- Sidebar Menu -->

    <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">




        <li class="nav-item">

          <a href="{{url('dashboard')}}" class="nav-link <?php if ($data['menu'] == 'dashboard') {
                                                            echo 'active';
                                                          } ?>">

            <i class="nav-icon fas fa-tachometer-alt"></i>

            <p>

              Dashboard

            </p>

          </a>

        </li>
@php if($userId==1){  @endphp

        <!----

        <li class="nav-item <?php if ($data['menu'] == 'settings') {
                              echo 'menu-open';
                            } ?>">

          <a href="#" class="nav-link <?php if ($data['menu'] == 'settings') {
                                        echo 'active';
                                      } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Settings

              <i class="right fas fa-angle-left"></i>

            </p>

          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">

              <a href="{{url('admin/settings')}}" class="nav-link <?php if ($data['sub_menu'] == 'setting') {
                                                                    echo 'active';
                                                                  } ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>Home Page Settings</p>

              </a>

            </li>



            <li class="nav-item">

              <a href="{{url('admin/general')}}" class="nav-link <?php if ($data['sub_menu'] == 'setting_gen') {
                                                                    echo 'active';
                                                                  } ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>General Settings</p>

              </a>

            </li>

          </ul>

        </li>

        -->



        <li class="nav-item">

          <a href="{{url('admin/slider')}}" class="nav-link <?php if ($data['menu'] == 'slider') {
                                                              echo 'active';
                                                            } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Slider

            </p>

          </a>

        </li>





        <li class="nav-item has-treeview <?php if ($data['menu'] == 'course') {
                              echo 'menu-open';
                            } ?>">

          <a href="#" class="nav-link <?php if ($data['menu'] == 'course') {
                                        echo 'active';
                                      } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Course Management

              <i class="right fas fa-angle-left"></i>

            </p>

          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">

              <a href="{{url('admin/course-category')}}" class="nav-link <?php if ($data['sub_menu'] == 'category') {
                                                                            echo 'active';
                                                                          } ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>Category Management</p>

              </a>

            </li>



            <li class="nav-item">

              <a href="{{url('admin/courses')}}" class="nav-link <?php if ($data['sub_menu'] == 'course') {
                                                                    echo 'active';
                                                                  } ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>Course Management</p>

              </a>

            </li>

 
            
  <li class="nav-item">

              <a href="{{url('admin/popular-courses')}}" class="nav-link <?php if ($data['sub_menu'] == 'popularcourses') {
                                                                    echo 'active';
                                                                  } ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>Popular Course</p>

              </a>

            </li>
            
              <li class="nav-item">

              <a href="{{url('admin/career-courses')}}" class="nav-link <?php if ($data['sub_menu'] == 'careercourses') {
                                                                    echo 'active';
                                                                  } ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>Career Course</p>

              </a>

            </li>
            
            
             <li class="nav-item">

              <a href="{{url('admin/copy-courses')}}" class="nav-link <?php if ($data['sub_menu'] == 'copycourses') {
                                                                    echo 'active';
                                                                  } ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>Copy Course</p>

              </a>

            </li>


            <li class="nav-item">

              <a href="{{url('admin/del_course_category')}}" class="nav-link <?php if ($data['sub_menu'] == 'del_course_category') {
                                                                                echo 'active';
                                                                              } ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>Deleted Course Category</p>

              </a>

            </li>

     
            
               <li class="nav-item">

              <a href="{{url('admin/course-category')}}" class="nav-link <?php if ($data['sub_menu'] == 'ViewCategory') {
                                                                            echo 'active';
                                                                          } ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>Category Order Management</p>

              </a>

            </li>

            <li class="nav-item">

              <a href="{{url('admin/del_course')}}" class="nav-link <?php if ($data['sub_menu'] == 'del_course') {
                                                                      echo 'active';
                                                                    } ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>Deleted Course</p>

              </a>

            </li>

          </ul>

        </li>





        <li class="nav-item has-treeview <?php if ($data['menu'] == 'blog') {
                              echo 'menu-open';
                            } ?>">

          <a href="#" class="nav-link <?php if ($data['menu'] == 'blog') {
                                        echo 'active';
                                      } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Blog Management

              <i class="right fas fa-angle-left"></i>

            </p>

          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">

              <a href="{{url('admin/blog-category')}}" class="nav-link <?php if ($data['sub_menu'] == 'category') {
                                                                          echo 'active';
                                                                        } ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>Category Management</p>

              </a>

            </li>



            <li class="nav-item">

              <a href="{{url('admin/blogs')}}" class="nav-link <?php if ($data['sub_menu'] == 'blog') {
                                                                  echo 'active';
                                                                } ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>Blog Management</p>

              </a>

            </li>





            <li class="nav-item">

              <a href="{{url('admin/del_blog_category')}}" class="nav-link <?php if ($data['sub_menu'] == 'del_category') {
                                                                              echo 'active';
                                                                            } ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>Deleted Category</p>

              </a>

            </li>



            <li class="nav-item">

              <a href="{{url('admin/del_blog')}}" class="nav-link <?php if ($data['sub_menu'] == 'del_blog') {
                                                                    echo 'active';
                                                                  } ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>Deleted Blogs</p>

              </a>

            </li>

          </ul>

        </li>




  <li class="nav-item ">
          <a href="{{url('admin/question-bank')}}" class="nav-link <?php if ($data['menu'] == 'questionbank') {
                                                                echo 'active';
                                                              } ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Question Bank
            </p>
          </a>
        </li>




        <li class="nav-item ">
          <a href="{{url('admin/enquiry')}}" class="nav-link <?php if ($data['menu'] == 'enquiry') {
                                                                echo 'active';
                                                              } ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Enquiry Form
            </p>
          </a>
        </li>




        <li class="nav-item ">

          <a href="{{url('admin/testimonial')}}" class="nav-link <?php if ($data['menu'] == 'testimonial') {
                                                                    echo 'active';
                                                                  } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Testimonial

            </p>

          </a>

        </li>





        <li class="nav-item ">

          <a href="{{url('admin/partner')}}" class="nav-link <?php if ($data['menu'] == 'partner') {
                                                                echo 'active';
                                                              } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Partner

            </p>

          </a>

        </li>
        
        
        
         <li class="nav-item ">

          <a href="{{url('admin/contact')}}" class="nav-link <?php if ($data['menu'] == 'contact') {
                                                                echo 'active';
                                                              } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Genral Details

            </p>

          </a>

        </li>





        <li class="nav-item ">

          <a href="{{url('admin/press')}}" class="nav-link <?php if ($data['menu'] == 'press') {
                                                              echo 'active';
                                                            } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Press

            </p>

          </a>

        </li>



        <li class="nav-item ">

          <a href="{{url('admin/placement')}}" class="nav-link <?php if ($data['menu'] == 'placement') {
                                                                  echo 'active';
                                                                } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Placement

            </p>

          </a>

        </li>



        <li class="nav-item ">

          <a href="{{url('admin/faq')}}" class="nav-link <?php if ($data['menu'] == 'faq') {
                                                            echo 'active';
                                                          } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Faq

            </p>

          </a>

        </li>





        <li class="nav-item ">

          <a href="{{url('admin/opening')}}" class="nav-link <?php if ($data['menu'] == 'opening') {
                                                                echo 'active';
                                                              } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Opening

            </p>

          </a>

        </li>


    <li class="nav-item ">

          <a href="{{url('admin/studentopening')}}" class="nav-link <?php if ($data['menu'] == 'studentopening') {
                                                                echo 'active';
                                                              } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Student Opening

            </p>

          </a>

        </li>


        <li class="nav-item has-treeview <?php if ($data['menu'] == 'reviews') { echo 'menu-open'; } ?>">
          <a href="#" class="nav-link <?php if ($data['menu'] == 'reviews') { echo 'active'; } ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Reviews Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('admin/review-category')}}" class="nav-link <?php if ($data['sub_menu'] == 'category') { echo 'active'; } ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Category Management</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/reviews')}}" class="nav-link <?php if ($data['sub_menu'] == 'reviews') { echo 'active'; } ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Reviews Management</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/del_review_category')}}" class="nav-link <?php if ($data['sub_menu'] == 'del_category') { echo 'active'; } ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Deleted Reviews Category</p>
              </a>
            </li>
          </ul>

        </li>



        <li class="nav-item ">

          <a href="{{url('admin/events')}}" class="nav-link <?php if ($data['menu'] == 'events') {
                                                              echo 'active';
                                                            } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Events

            </p>

          </a>

        </li>





        <li class="nav-item ">

          <a href="{{url('admin/brochure')}}" class="nav-link <?php if ($data['menu'] == 'brochure') {
                                                                echo 'active';
                                                              } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Brochure

            </p>

          </a>

        </li>

        <li class="nav-item ">

          <a href="{{url('admin/location')}}" class="nav-link <?php if ($data['menu'] == 'Location') {
                                                                echo 'active';
                                                              } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Location

            </p>

          </a>

        </li>
        
            <li class="nav-item ">

          <a href="{{url('admin/managetheme')}}" class="nav-link <?php if ($data['menu'] == 'managetheme') {
                                                                echo 'active';
                                                              } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Manage Theme

            </p>

          </a>

        </li>
        
                <li class="nav-item ">

          <a href="{{url('admin/video')}}" class="nav-link <?php if ($data['menu'] == 'video') {
                                                                echo 'active';
                                                              } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Video

            </p>

          </a>

        </li>
        
              <li class="nav-item ">

          <a href="{{url('admin/landingpage')}}" class="nav-link <?php if ($data['menu'] == 'landingpage') {
                                                                echo 'active';
                                                              } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

            Create Landing Page

            </p>

          </a>

        </li>
        
         <li class="nav-item ">

          <a href="{{url('admin/gallery')}}" class="nav-link <?php if ($data['menu'] == 'Gallery') {
                                                                echo 'active';
                                                              } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Gallery

            </p>

          </a>

        </li>
        
         <li class="nav-item ">

          <a href="{{url('admin/gallery-cat')}}" class="nav-link <?php if ($data['menu'] == 'Gallerycat') {
                                                                echo 'active';
                                                              } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Gallery Category

            </p>

          </a>

        </li>
           <li class="nav-item ">

          <a href="{{url('admin/sitemap-generator')}}" class="nav-link <?php if ($data['menu'] == 'sitemap') {
                                                                echo 'active';
                                                              } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Manage Sitemap

            </p>

          </a>

        </li>
        
             <li class="nav-item ">

          <a href="{{url('admin/robots-file')}}" class="nav-link <?php if ($data['menu'] == 'robots') {
                                                                echo 'active';
                                                              } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

              Manage robots File

            </p>

          </a>

        </li>
        
            <li class="nav-item ">

          <a href="{{url('admin/redirectmanager')}}" class="nav-link <?php if ($data['menu'] == 'redirectmanager') {
                                                                echo 'active';
                                                              } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

               Redirect Manager

            </p>

          </a>

        </li>
        
        
           <li class="nav-item ">

          <a href="{{url('admin/schema')}}" class="nav-link <?php if ($data['menu'] == 'schema') {
                                                                echo 'active';
                                                              } ?>">

            <i class="nav-icon fas fa-th"></i>

            <p>

               Schema Manager

            </p>

          </a>

        </li>
       
        
@php } else{@endphp 

    <li class="nav-item ">
          <a href="{{url('admin/enquiry')}}" class="nav-link <?php if ($data['menu'] == 'enquiry') {
                                                                echo 'active';
                                                              } ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Enquiry Form
            </p>
          </a>
        </li>
        
       <li class="nav-item ">
          <a href="{{url('admin/DownloadCurriculum')}}" class="nav-link <?php if ($data['menu'] == 'DownloadCurriculum') {
                                                                echo 'active';
                                                              } ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
            Download Curriculum
            </p>
          </a>
        </li> 
@php 
}

@endphp

  
        <li class="nav-item ">

          <a href="{{url('logout')}}" class="nav-link">

            <i class="nav-icon fas fa-tachometer-alt"></i>

            <p>

              Logout

            </p>

          </a>

        </li>



      </ul>

    </nav>

    <!-- /.sidebar-menu -->

  </div>

  <!-- /.sidebar -->

</aside>



<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    const treeviewMenuItems = document.querySelectorAll('.nav-item.has-treeview > a');

    treeviewMenuItems.forEach(item => {
      item.addEventListener('click', function(e) {
        // Prevent default behavior
        e.preventDefault();

        // Find and close any other open menus
        document.querySelectorAll('.nav-item.has-treeview.menu-open').forEach(openItem => {
          if (openItem !== this.parentElement) {
            openItem.classList.remove('menu-open');
            openItem.classList.remove('menu-is-opening');
            openItem.querySelector('.nav-treeview').style.display = 'none';
          }
        });

        // Toggle the clicked menu
        const parent = this.parentElement;
        if (parent.classList.contains('menu-open')) {
          parent.classList.remove('menu-open');
          parent.classList.remove('menu-is-opening');
          parent.querySelector('.nav-treeview').style.display = 'none';
        } else {
          parent.classList.add('menu-open');
          parent.querySelector('.nav-treeview').style.display = 'block';
        }
      });
    });
  });
</script>