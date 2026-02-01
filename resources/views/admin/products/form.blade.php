@include('admin.components.adminHeader')
@include('admin.components.adminMenu')

<div class="container">

    {{-- TABS NAV --}}
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#main" data-toggle="tab">Основни</a>
        </li>

        @if(isset($product))
            <li>
                <a href="#gallery" data-toggle="tab">Галерия</a>
            </li>
            <li>
                <a href="#docs" data-toggle="tab">Документи</a>
            </li>
            <li>
                <a href="#materials" data-toggle="tab">Материали</a>
            </li>
            <li>
                <a href="#pricing" data-toggle="tab">Ценообразуване</a>
            </li>
            <li>
                <a href="#admin" data-toggle="tab">Административни</a>
            </li>
        @endif
    </ul>

    {{-- TABS CONTENT --}}
    <div class="tab-content" style="padding-top:20px">

        {{-- MAIN --}}
        <div id="main" class="tab-pane fade in active">
            @include('admin.products.tabs.main')
        </div>

        @if(isset($product))
            {{-- GALLERY --}}
            <div id="gallery" class="tab-pane fade">
                @include('admin.products.tabs.gallery')
            </div>

            {{-- DOCUMENTS --}}
            <div id="docs" class="tab-pane fade">
                @include('admin.products.tabs.documents')
            </div>

            {{-- MATERIALS --}}
            <div id="materials" class="tab-pane fade">
                @include('admin.products.tabs.materials')
            </div>

            {{-- PRICING --}}
            <div id="pricing" class="tab-pane fade">
                @include('admin.products.tabs.pricing')
            </div>

            {{-- ADMIN --}}
            <div id="admin" class="tab-pane fade">
                @include('admin.products.tabs.admin')
            </div>
        @endif

    </div>
</div>

@include('admin.components.adminFooter')
