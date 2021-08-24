<x-app>
    <div class="main_div">
        <div class="row">
            <h2 class="title_text">Projekt létrehozása</h2>
        </div>
        <div class="row">
        <form
            action="{{ route('store') }}"
            method="POST"
            class="w-full"
        >
        @csrf
            <div class="form_elements">
                <div class="col-20">
                    <label for="title">Cím</label>
                </div>
                <div class="col-80">
                    <input type="text" name="title" id="title" required>
                </div>
            </div>

            <div class="form_elements">
                <div class="col-20">
                    <label for="description">Leírás</label>
                </div>
                <div class="col-80">
                    <textarea type="text" name="description" id="description" required></textarea>
                </div>
            </div>

            <contactadd></contactadd>
            
            <footer>
                
                <div class="add_btn_container">
                    <a href="/" class="back_btn">Mégsem</a>
                    <button type="submit" class="save_btn">Mentés</button>
                </div>
            </footer>

        </form>
        </div>
    </div>
</x-app>