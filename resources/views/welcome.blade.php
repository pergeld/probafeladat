<x-app>
    <div class="main_div">
        <div class="row">
            <h2 class="title_text">Projektek</h2>
        </div>
        <div class="row">
            <div class="add_btn_container">
                <a href="{{ route('create') }}" class="add_btn"><i class="fas fa-plus"></i> Új projekt felvétele</a>
            </div>
        </div>
        <div class="row">
            <project></project>
        </div>
    </div>
</x-app>