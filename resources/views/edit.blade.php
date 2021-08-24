<x-app>
    <div class="main_div">
        <div class="row">
            <h2 class="title_text">Projekt szerkesztése</h2>
        </div>
        <div class="row">
            <form action="{{ route('update', $project->id) }}" method="POST" class="w-full">
            @csrf
            @method('PATCH')

                <div class="form_elements">
                    <div class="col-20">
                        <label for="title">Cím</label>
                    </div>
                    <div class="col-80">
                        <input type="text" name="title" id="title" value="{{ $project->title }}" required>
                    </div>
                </div>

                <div class="form_elements">
                    <div class="col-20">
                        <label for="description">Leírás</label>
                    </div>
                    <div class="col-80">
                        <textarea type="text" name="description" id="description">{{ $project->description }}</textarea>
                    </div>
                </div>

                <div class="form_elements">
                    <div class="col-20">
                        <label for="status">Státusz</label>
                    </div>
                    <div class="col-80">
                        <select name="status" id="status">
                        <option value="fejlesztésre vár" {{ $project->status == "fejlesztésre vár" ? 'selected' : '' }}>Fejlesztésre vár</option>
                            <option value="folyamatban" {{ $project->status == "folyamatban" ? 'selected' : '' }}>Folyamatban</option>
                            <option value="kész" {{ $project->status == "kész" ? 'selected' : '' }}>Kész</option>
                        </select>
                    </div>
                </div>

                <div class="form_elements">
                    <label for="">Kapcsolattartók</label>
                    <table class="second_table">
                        @forelse($project->contacts as $contact)
                            <tr>
                                <td>
                                    <input
                                        type="hidden"
                                        name="ids[]"
                                        value="{{ $contact->id }}"
                                    >
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        name="names[]"
                                        value="{{ $contact->name }}"
                                        required
                                    >
                                </td>
                                <td>
                                    <input
                                        type="email"
                                        name="emails[]"
                                        value="{{ $contact->email }}"
                                        required
                                    >
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Nincsennek a projekthez kapcsolattartók felvéve</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
                
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