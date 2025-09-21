  <nav>
      <div class="app-logo">
          <a class="logo d-inline-block" href="index.html">
              <img alt="#" src="{{ asset('/admin/assets/images/logo/1.png') }}" />
          </a>

          <span class="bg-light-primary toggle-semi-nav d-flex-center">
              <i class="ti ti-chevron-right"></i>
          </span>

          <div class="d-flex align-items-center nav-profile p-3">
              <span class="h-45 w-45 d-flex-center b-r-10 position-relative bg-danger m-auto">
                  <img alt="avatar" class="img-fluid b-r-10"
                      src="{{ asset('/admin/assets/images/avatar/woman.jpg') }}" />
                  <span class="position-absolute top-0 end-0 p-1 bg-success border border-light rounded-circle"></span>
              </span>
              <div class="flex-grow-1 ps-2">
                  <h6 class="text-primary mb-0">{{ Auth::user()->name }}</h6>
                  <p class="text-muted f-s-12 mb-0">{{ Auth::user()->roles->pluck('name')->implode(', ') }}</p>
              </div>

              <div class="dropdown profile-menu-dropdown">
                  <a aria-expanded="false" data-bs-auto-close="true" data-bs-placement="top" data-bs-toggle="dropdown"
                      role="button">
                      <i class="ti ti-settings fs-5"></i>
                  </a>
                  <ul class="dropdown-menu">
                      <li class="dropdown-item">
                          <a class="f-w-500" href="profile.html" target="_blank">
                              <i class="ph-duotone ph-user-circle pe-1 f-s-20"></i>
                              Profile Details
                          </a>
                      </li>
                      <li class="dropdown-item">
                          <a class="f-w-500" href="setting.html" target="_blank">
                              <i class="ph-duotone ph-gear pe-1 f-s-20"></i> Settings
                          </a>
                      </li>
                      <li class="dropdown-item">
                          <div class="d-flex align-items-center justify-content-between">
                              <div>
                                  <a class="f-w-500" href="#">
                                      <i class="ph-duotone ph-detective pe-1 f-s-20"></i>
                                      Incognito
                                  </a>
                              </div>
                              <div class="flex-shrink-0">
                                  <div class="form-check form-switch">
                                      <input class="form-check-input form-check-primary" id="incognitoSwitch"
                                          type="checkbox" />
                                  </div>
                              </div>
                          </div>
                      </li>
                      <li class="dropdown-item">
                          <a class="mb-0 text-secondary f-w-500" href="sign_up.html" target="_blank">
                              <i class="ph-bold ph-plus pe-1 f-s-20"></i> Add account
                          </a>
                      </li>

                      <li class="app-divider-v dotted py-1"></li>

                      <li class="dropdown-item">
                          <a class="mb-0 text-danger" href="/admin/logout">
                              <i class="ph-duotone ph-sign-out pe-1 f-s-20"></i> Log Out
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <div class="app-nav" id="app-simple-bar">
          <ul class="main-nav p-0 mt-3">
              {{-- <li class="menu-title">
                  <span>Dashboard</span>
              </li> --}}
              <li class="no-sub mb-2">
                  <a aria-expanded="{{ request()->is('admin/dashboard') ? 'true' : 'false' }}" href="/admin/dashboard">
                      <i class="ph-duotone ph-house pe-1 f-s-20" style="margin-right: 8px;"></i>
                      Dashboard
                  </a>
              </li>
              <li class="no-sub mb-2">
                  <a aria-expanded="{{ request()->is('admin/news') ? 'true' : 'false' }}" href="/admin/news">
                      <i class="ph-duotone ph-newspaper pe-1 f-s-20" style="margin-right: 8px;"></i>
                      News
                  </a>
              </li>
              <li class="no-sub mb-2">
                  <a aria-expanded="{{ request()->is('admin/complaints') ? 'true' : 'false' }}"
                      href="/admin/complaints">
                      <i class="ph-duotone ph-chat-circle-dots pe-1 f-s-20" style="margin-right: 8px;"></i>
                      Complaints
                  </a>
              </li>
              <li class="no-sub mb-2">
                  <a aria-expanded="{{ request()->is('admin/services') ? 'true' : 'false' }}" href="/admin/services">
                      <i class="ph-duotone ph-briefcase pe-1 f-s-20" style="margin-right: 8px;"></i>
                      Services
                  </a>
              </li>
              <li class="no-sub mb-2">
                  <a aria-expanded="{{ request()->is('admin/subscriptions') ? 'true' : 'false' }}"
                      href="/admin/subscriptions">
                      <i class="ph-duotone ph-bookmark-simple pe-1 f-s-20" style="margin-right: 8px;"></i>
                      Subscriptions
                  </a>
              </li>
              <li class="no-sub mb-2">
                  <a aria-expanded="{{ request()->is('admin/bills') ? 'true' : 'false' }}" href="/admin/bills">
                      <i class="ph-duotone ph-paper-plane-tilt pe-1 f-s-20" style="margin-right: 8px;"></i>
                      Bills
                  </a>
              </li>
              <li class="no-sub mb-2">
                  <a aria-expanded="{{ request()->is('admin/payments') ? 'true' : 'false' }}" href="/admin/payments">
                      <i class="ph-duotone ph-credit-card pe-1 f-s-20" style="margin-right: 8px;"></i>
                      Payments
                  </a>
              </li>

              <li class="no-sub mb-2">
                  <a aria-expanded="{{ request()->is('admin/users') ? 'true' : 'false' }}" href="/admin/users">
                      <i class="ph-duotone ph-users pe-1 f-s-20" style="margin-right: 8px;"></i>
                      Users
                  </a>
              </li>
              {{-- <li>
                  <a aria-expanded="false" data-bs-toggle="collapse" href="#apps">
                      <svg stroke="currentColor" stroke-width="1.5">
                          <use
                              xlink:href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/svg/_sprite.svg#stack">
                          </use>
                      </svg>
                      Apps
                  </a>
                  <ul class="collapse" id="apps">
                      <li><a href="calendar.html">Calender</a></li>
                      <li class="another-level">
                          <a aria-expanded="false" data-bs-toggle="collapse" href="#Profile-page">
                              Profile
                          </a>
                          <ul class="collapse" id="Profile-page">
                              <li><a href="profile.html">Profile</a></li>
                              <li><a href="setting.html">Setting</a></li>
                          </ul>
                      </li>
                      <li class="another-level">
                          <a aria-expanded="false" data-bs-toggle="collapse" href="#projects-page">
                              Projects Page
                          </a>
                          <ul class="collapse" id="projects-page">
                              <li><a href="project_app.html">projects</a></li>
                              <li><a href="project_details.html">projects Details</a></li>
                          </ul>
                      </li>
                      <li><a href="to_do.html">To-Do</a></li>
                      <li><a href="team.html">Team</a></li>
                      <li><a href="api.html">API</a></li>
                      <li class="another-level">
                          <a aria-expanded="false" data-bs-toggle="collapse" href="#ticket-page">
                              Ticket
                          </a>
                          <ul class="collapse" id="ticket-page">
                              <li><a href="ticket.html">Ticket</a></li>
                              <li><a href="ticket_details.html">Ticket Details</a></li>
                          </ul>
                      </li>
                      <li class="another-level">
                          <a aria-expanded="false" data-bs-toggle="collapse" href="#email-page">
                              Email Page
                          </a>
                          <ul class="collapse" id="email-page">
                              <li><a href="email.html"> Email</a></li>
                              <li><a href="read_email.html">Read Email</a></li>
                          </ul>
                      </li>
                      <li class="another-level">
                          <a aria-expanded="false" data-bs-toggle="collapse" href="#e-shop">
                              E-shop
                          </a>
                          <ul class="collapse" id="e-shop">
                              <li><a href="cart.html">Cart</a></li>
                              <li><a href="product.html">Product</a></li>
                              <li><a href="add_product.html">Add Product</a></li>
                              <li><a href="product_details.html">Product-Details</a></li>
                              <li><a href="product_list.html">Product list</a></li>
                              <li><a href="orders.html">Orders</a></li>
                              <li><a href="orders_details.html">Orders Details</a></li>
                              <li><a href="orders_list.html">Orders List</a></li>
                              <li><a href="checkout.html">Check out</a></li>
                              <li><a href="wishlist.html">Wishlist</a></li>
                          </ul>
                      </li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="chat.html">Chat</a></li>
                      <li><a href="file_manager.html">File manager</a></li>
                      <li><a href="bookmark.html">Bookmark</a></li>
                      <li><a href="kanban_board.html">Kanban board</a></li>
                      <li><a href="timeline.html">Timeline</a></li>
                      <li><a href="faq.html">FAQS</a></li>f
                      <li><a href="pricing.html">Pricing</a></li>
                      <li><a href="gallery.html">Gallery</a></li>
                      <li class="another-level">
                          <a aria-expanded="false" data-bs-toggle="collapse" href="#blog-page">
                              Blog Page
                          </a>
                          <ul class="collapse" id="blog-page">
                              <li><a href="blog.html">Blog</a></li>
                              <li><a href="blog_read_more.html">Blog Details</a></li>
                              <li><a href="add_blog.html">Add Blog</a></li>
                          </ul>
                      </li>
                  </ul>
              </li>
              <li class="no-sub">
                  <a href="widget.html">
                      <svg stroke="currentColor" stroke-width="1.5">
                          <use
                              xlink:href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/svg/_sprite.svg#squares">
                          </use>
                      </svg>
                      Widgets
                  </a>
              </li>

              <li class="menu-title"><span>Component</span></li>
              <li>
                  <a aria-expanded="false" data-bs-toggle="collapse" href="#ui-kits">
                      <svg stroke="currentColor" stroke-width="1.5">
                          <use
                              xlink:href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/svg/_sprite.svg#briefcase">
                          </use>
                      </svg>
                      UI kits
                  </a>
                  <ul class="collapse" id="ui-kits">
                      <li><a href="cheatsheet.html">Cheatsheet</a></li>
                      <li><a href="alert.html">Alert</a></li>
                      <li><a href="badges.html">Badges</a></li>
                      <li><a href="buttons.html">Buttons</a></li>
                      <li><a href="cards.html">Cards</a></li>
                      <li><a href="dropdown.html">Dropdown</a></li>
                      <li><a href="grid.html">Grid</a></li>
                      <li><a href="avatar.html">Avatar</a></li>
                      <li><a href="tabs.html">Tabs</a></li>
                      <li><a href="accordions.html">Accordions</a></li>
                      <li><a href="progress.html">Progress</a></li>
                      <li><a href="notifications.html">Notifications</a></li>
                      <li><a href="list.html">Lists</a></li>
                      <li><a href="helper_classes.html">Helper Classes</a></li>
                      <li><a href="background.html">Background</a></li>
                      <li><a href="divider.html">Divider</a></li>
                      <li><a href="ribbons.html">Ribbons</a></li>
                      <li><a href="editor.html">Editor </a></li>
                      <li><a href="collapse.html">Collapse</a></li>
                      <li><a href="footer-page.html">Footer</a></li>
                      <li><a href="shadow.html">Shadow</a></li>
                      <li><a href="wrapper.html">Wrapper</a></li>
                      <li><a href="bullet.html">Bullet</a></li>
                      <li><a href="placeholder.html">Placeholder</a></li>
                      <li><a href="alignment.html">Alignment Thing</a></li>
                  </ul>
              </li>

              <li>
                  <a aria-expanded="false" data-bs-toggle="collapse" href="#advance-ui">
                      <svg stroke="currentColor" stroke-width="1.5">
                          <use
                              xlink:href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/svg/_sprite.svg#briefcase-advance">
                          </use>
                      </svg>
                      Advance UI
                      <span class="badge rounded-pill bg-warning badge-notification ms-2">
                          12+
                          <span class="visually-hidden">unread messages</span>
                      </span>
                  </a>
                  <ul class="collapse" id="advance-ui">
                      <li><a href="modals.html">Modals</a></li>
                      <li><a href="offcanvas.html">Offcanvas Toggle</a></li>
                      <li><a href="sweetalert.html">Sweat Alert</a></li>
                      <li><a href="scrollbar.html">Scrollbar</a></li>
                      <li><a href="spinners.html">Spinners</a></li>
                      <li><a href="animation.html">Animation</a></li>
                      <li><a href="video_embed.html">Video Embed</a></li>
                      <li><a href="tour.html">Tour</a></li>
                      <li><a href="slick.html">Slider</a></li>
                      <li><a href="bootstrap_slider.html">Bootstrap Slider</a></li>
                      <li><a href="scrollpy.html">Scrollpy</a></li>
                      <li><a href="tooltips_popovers.html">Tooltip & Popovers</a></li>
                      <li><a href="ratings.html">Rating</a></li>
                      <li><a href="prismjs.html">Prismjs</a></li>
                      <li><a href="count_down.html">Count Down</a></li>
                      <li><a href="count_up.html"> Count up </a></li>
                      <li><a href="draggable.html">Draggable</a></li>
                      <li><a href="tree-view.html">Tree View</a></li>
                      <li><a href="block_ui.html">Block Ui </a></li>
                  </ul>
              </li>
              <li>
                  <a aria-expanded="false" data-bs-toggle="collapse" href="#icons">
                      <svg stroke="currentColor" stroke-width="1.5">
                          <use
                              xlink:href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/svg/_sprite.svg#gift">
                          </use>
                      </svg>
                      Icons
                  </a>
                  <ul class="collapse" id="icons">
                      <li><a href="fontawesome.html">Fontawesome</a></li>
                      <li><a href="flag_icons.html">Flag</a></li>
                      <li><a href="tabler-icons.html">Tabler</a></li>
                      <li><a href="weather_icon.html">Weather</a></li>
                      <li><a href="animated_icon.html">Animated</a></li>
                      <li><a href="iconoir_icon.html">Iconoir</a></li>
                      <li><a href="phosphor.html">Phosphor</a></li>
                  </ul>
              </li>
              <li class="no-sub">
                  <a href="misc.html">
                      <svg stroke="currentColor" stroke-width="1.5">
                          <use
                              xlink:href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/svg/_sprite.svg#rectangle">
                          </use>
                      </svg>
                      Misc
                  </a>
              </li>
              <li class="menu-title"><span>Map & Charts </span></li>
              <li>
                  <a aria-expanded="false" data-bs-toggle="collapse" href="#maps">
                      <svg stroke="currentColor" stroke-width="1.5">
                          <use
                              xlink:href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/svg/_sprite.svg#location">
                          </use>
                      </svg>
                      Map
                  </a>
                  <ul class="collapse" id="maps">
                      <li><a href="google-map.html">Google Maps</a></li>
                      <li><a href="leaflet-map.html">Leaflet map</a></li>
                  </ul>
              </li>
              <li>
                  <a aria-expanded="false" data-bs-toggle="collapse" href="#chart">
                      <svg stroke="currentColor" stroke-width="1.5">
                          <use
                              xlink:href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/svg/_sprite.svg#chart">
                          </use>
                      </svg>
                      Chart
                  </a>
                  <ul class="collapse" id="chart">
                      <li><a href="chart_js.html">Chart js</a></li>

                      <li class="another-level">
                          <a aria-expanded="false" data-bs-toggle="collapse" href="#apexcharts-page">
                              Apexcharts
                          </a>
                          <ul class="collapse" id="apexcharts-page">
                              <li><a href="line.html">Line</a></li>
                              <li><a href="area_charts.html">Area</a></li>
                              <li><a href="column.html">Column</a></li>
                              <li><a href="bar.html">Bar</a></li>
                              <li><a href="mixed.html">Mixed</a></li>
                              <li>
                                  <a href="timeline_range_charts.html">Timeline & Range-Bars</a>
                              </li>
                              <li><a href="candlestick_charts.html">Candlestick</a></li>
                              <li><a href="boxplot.html">Boxplot</a></li>
                              <li><a href="bubble.html">Bubble</a></li>
                              <li><a href="scatter.html">Scatter</a></li>
                              <li><a href="heatmap.html">Heatmap</a></li>
                              <li><a href="treemap.html">Treemap</a></li>
                              <li><a href="pie_charts.html">Pie</a></li>
                              <li><a href="radial_bar.html">Radial bar</a></li>
                              <li><a href="radar_chart.html">Radar</a></li>
                          </ul>
                      </li>
                  </ul>
              </li>

              <li class="menu-title"><span>Table & forms </span></li>

              <li>
                  <a aria-expanded="false" data-bs-toggle="collapse" href="#table">
                      <svg stroke="currentColor" stroke-width="1.5">
                          <use
                              xlink:href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/svg/_sprite.svg#table">
                          </use>
                      </svg>
                      Table
                  </a>
                  <ul class="collapse" id="table">
                      <li><a href="basic_table.html">BasicTable</a></li>
                      <li><a href="data_table.html">Data Table</a></li>
                      <li><a href="list_table.html">List Js</a></li>
                      <li><a href="advance_table.html">Advance Table</a></li>
                  </ul>
              </li>

              <li>
                  <a aria-expanded="false" data-bs-toggle="collapse" href="#forms">
                      <svg stroke="currentColor" stroke-width="1.5">
                          <use
                              xlink:href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/svg/_sprite.svg#wallet">
                          </use>
                      </svg>
                      Forms elements
                  </a>
                  <ul class="collapse" id="forms">
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="base_inputs.html">Base Input</a></li>
                      <li><a href="checkbox_radio.html">Checkbox & Radio</a></li>
                      <li><a href="input_groups.html">Input Groups</a></li>
                      <li><a href="input_masks.html">Input Masks</a></li>
                      <li><a href="floating_labels.html">Floating Labels</a></li>
                      <li><a href="date_picker.html">Datetimepicker</a></li>
                      <li><a href="touch_spin.html">Touch spin</a></li>
                      <li><a href="select.html">Select2</a></li>
                      <li><a href="switch.html">Switch</a></li>
                      <li><a href="range_slider.html">Range Slider</a></li>
                      <li><a href="typeahead.html">Typeahead</a></li>
                      <li><a href="textarea.html">Textarea</a></li>
                      <li><a href="clipboard.html">Clipboard</a></li>
                      <li><a href="file_upload.html">File Upload</a></li>
                      <li><a href="dual_list_boxes.html">Dual List Boxes</a></li>
                      <li><a href="default_forms.html">Default Forms</a></li>
                  </ul>
              </li>

              <li>
                  <a aria-expanded="false" data-bs-toggle="collapse" href="#ready_to_use">
                      <svg stroke="currentColor" stroke-width="1.5">
                          <use
                              xlink:href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/svg/_sprite.svg#newspaper">
                          </use>
                      </svg>
                      Ready to use
                      <span class="badge text-bg-success badge-notification ms-2">2</span>
                  </a>
                  <ul class="collapse" id="ready_to_use">
                      <li><a href="form_wizards.html">Form wizards</a></li>
                      <li><a href="form_wizard_1.html">Form wizards 1</a></li>
                      <li><a href="form_wizard_2.html">Form wizards 2</a></li>
                      <li><a href="ready_to_use_form.html">Ready To Use Form</a></li>
                      <li>
                          <a href="ready_to_use_table.html">Ready To Use Tables</a>
                      </li>
                  </ul>
              </li>

              <li class="menu-title"><span>Pages</span></li>

              <li>
                  <a aria-expanded="false" data-bs-toggle="collapse" href="#auth_pages">
                      <svg stroke="currentColor" stroke-width="1.5">
                          <use
                              xlink:href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/svg/_sprite.svg#window">
                          </use>
                      </svg>
                      Auth Pages
                  </a>
                  <ul class="collapse" id="auth_pages">
                      <li><a href="sign_in.html">Sign In</a></li>
                      <li><a href="sign_in_1.html">Sign In with Bg-image</a></li>
                      <li><a href="sign_up.html">Sign Up</a></li>
                      <li><a href="sign_up_1.html">Sign Up with Bg-image</a></li>
                      <li><a href="password_reset.html">Password Reset</a></li>
                      <li>
                          <a href="password_reset_1.html">Password Reset with Bg-image</a>
                      </li>
                      <li><a href="password_create.html">Password Create</a></li>
                      <li>
                          <a href="password_create_1.html">Password Create with Bg-image</a>
                      </li>
                      <li><a href="lock_screen.html">Lock Screen</a></li>
                      <li>
                          <a href="lock_screen_1.html">Lock Screen with Bg-image</a>
                      </li>
                      <li>
                          <a href="two_step_verification.html">Two-Step Verification</a>
                      </li>
                      <li>
                          <a href="two_step_verification_1.html">Two-Step Verification with Bg-image</a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a aria-expanded="false" data-bs-toggle="collapse" href="#error_pages">
                      <svg stroke="currentColor" stroke-width="1.5">
                          <use
                              xlink:href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/svg/_sprite.svg#exclamation-circle">
                          </use>
                      </svg>
                      Error Pages
                  </a>
                  <ul class="collapse" id="error_pages">
                      <li><a href="error_400.html">Bad Request </a></li>
                      <li><a href="error_403.html">Forbidden </a></li>
                      <li><a href="error_404.html">Not Found</a></li>
                      <li><a href="error_500.html">Internal Server</a></li>
                      <li><a href="error_503.html">Service Unavailable</a></li>
                  </ul>
              </li>

              <li>
                  <a aria-expanded="false" data-bs-toggle="collapse" href="#other_pages">
                      <svg stroke="currentColor" stroke-width="1.5">
                          <use
                              xlink:href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/svg/_sprite.svg#document">
                          </use>
                      </svg>
                      Other Pages
                  </a>
                  <ul class="collapse" id="other_pages">
                      <li><a href="blank.html">Blank</a></li>
                      <li><a href="maintenance.html">Maintenance</a></li>
                      <li><a href="landing.html">Landing Page</a></li>
                      <li><a href="coming_soon.html">Coming Soon</a></li>
                      <li><a href="sitemap.html">Sitemap</a></li>
                      <li><a href="privacy_policy.html">Privacy Policy</a></li>
                      <li>
                          <a href="terms_condition.html">Terms &amp; Condition</a>
                      </li>
                  </ul>
              </li>

              <li class="menu-title"><span>Others</span></li>

              <li>
                  <a aria-expanded="false" data-bs-toggle="collapse" href="#level">
                      <svg stroke="currentColor" stroke-width="1.5">
                          <use
                              xlink:href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/svg/_sprite.svg#arrow-down">
                          </use>
                      </svg>
                      2 level
                  </a>
                  <ul class="collapse" id="level">
                      <li><a href="#">Blank</a></li>
                      <li class="another-level">
                          <a aria-expanded="false" data-bs-toggle="collapse" href="#level2">
                              Another level
                          </a>
                          <ul class="collapse" id="level2">
                              <li><a href="blank.html">Blank</a></li>
                          </ul>
                      </li>
                  </ul>
              </li>
              <li class="no-sub">
                  <a href="https://phpstack-1384472-5121645.cloudwaysapps.com/document/html/ki-admin/index.html">
                      <svg stroke="currentColor" stroke-width="1.5">
                          <use
                              xlink:href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/svg/_sprite.svg#document-text">
                          </use>
                      </svg>
                      Document
                  </a>
              </li>

              <li class="no-sub">
                  <a href="mailto:teqlathemes@gmail.com">
                      <svg stroke="currentColor" stroke-width="1.5">
                          <use
                              xlink:href="https://phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/assets/svg/_sprite.svg#chat-bubble">
                          </use>
                      </svg>
                      Support
                  </a>
              </li> --}}
          </ul>
      </div>

      <div class="menu-navs">
          <span class="menu-previous"><i class="ti ti-chevron-left"></i></span>
          <span class="menu-next"><i class="ti ti-chevron-right"></i></span>
      </div>
  </nav>
