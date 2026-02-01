<div class="list-menu-view">
    <!--Leftbar Start Here -->
    <div class="col-md-2 left-aside desktop-view" style="position: relative">
        <div class="left-navigation">
            <ul class="list-accordion">
                <li>
                    <a href="#" class="waves-effect">
                        <span class="nav-label">Dashboard</span>
                    </a>
                </li>
            </ul>

            {{-- НОВИНИ --}}
            <li class="menu-item">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-news"></i>
                    <div>Новини</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('admin.news.index') }}" class="menu-link">
                            <div>Списък</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.news.create') }}" class="menu-link">
                            <div>Добави новина</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.color-variants.index') }}" class="menu-link">
                            <div>Колекции</div>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- ПРОДУКТИ --}}
            <li class="menu-item">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-package"></i>
                    <div>Продукти</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('admin.products.index') }}" class="menu-link">
                            <div>Списък продукти</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.products.create') }}" class="menu-link">
                            <div>Добави продукт</div>
                        </a>
                    </li>
                </ul>
            </li>

        </div>
    </div>

    {{-- FULLSCREEN IMAGE VIEWER --}}
    <div id="imgViewer" onclick="this.style.display='none'">
        <img id="imgViewerImg">
    </div>

    <style>
        #imgViewer{
            display:none;
            position:fixed;
            inset:0;
            background:rgba(0,0,0,.9);
            z-index:9999;
        }
        #imgViewer img{
            max-width:90%;
            max-height:90%;
            margin:auto;
            display:block;
            margin-top:5%;
        }
    </style>

    <script>
        function openImage(src){
            document.getElementById('imgViewerImg').src = src;
            document.getElementById('imgViewer').style.display = 'block';
        }
    </script>

    <!--Rightbar Start Here -->
    <div class="col-md-10">
