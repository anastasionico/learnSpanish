<aside class="left-sidebar" data-sidebarbg="skin5">
   <!-- Sidebar scroll-->
   <div class="scroll-sidebar">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav">
         <ul id="sidebarnav" class="p-t-30">
            {{-- <li class="sidebar-item"> 
               <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/index" aria-expanded="false">
               <i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span>
               </a>
            </li> --}}
            <li class="sidebar-item">
               <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
               <i class="mdi mdi-gamepad-variant"></i><span class="hide-menu">Game</span>
               </a>
               <ul aria-expanded="false" class="collapse  first-level">
                  <li class="sidebar-item">
                     <a href="/admin/verbs" class="sidebar-link">
                     <i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">Verbs</span>
                     </a>
                  </li>
                  {{-- <li class="sidebar-item">
                     <a href="icon-material.html" class="sidebar-link">
                     <i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Tenses</span>
                     </a>
                  </li> --}}
                  
               </ul>
            </li>
            <li class="sidebar-item"> 
               <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/users" aria-expanded="false">
               <i class="mdi mdi-account"></i><span class="hide-menu">Users</span>
               </a>
            </li>                     
            <li class="sidebar-item"> 
               <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/plans" aria-expanded="false">
               <i class="mdi mdi-credit-card-multiple"></i><span class="hide-menu">Plans</span>
               </a>
            </li>                     
            <li class="sidebar-item"> 
               <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/messages" aria-expanded="false">
                  <i class="mdi mdi-message-text"></i>
                  <span class="hide-menu">Messages</span>
                  @if($messageCount > 0) 
                      <small style="margin-left:1rem;background: red;border-radius: 5%;padding: 0 1rem">{{ $messageCount}}</small>
                  @endif
               </a>
            </li>                     
{{--             <li class="sidebar-item"> 
               <a class="sidebar-link waves-effect waves-dark sidebar-link" href="charts.html" aria-expanded="false">
               <i class="mdi mdi-twitter-retweet"></i><span class="hide-menu">Social</span>
               </a>
            </li>                      --}}
         </ul>
      </nav>
      <!-- End Sidebar navigation -->
   </div>
   <!-- End Sidebar scroll-->
</aside>