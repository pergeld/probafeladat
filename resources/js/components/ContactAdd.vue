<template>
    <div>
        <label>Új kapcsolattartó felvétele</label>
        <div class="add_btn_container">
            <a @click="addNewField()" class="add_btn"><i class="fas fa-plus"></i> Hozzáadás</a>
        </div>
        <div class="form_elements">
        <table class="second_table">
        <tr v-for="(field, index) in fields" :key="index">
            <td>
                <input
                    v-model="field.name"
                    type="text"
                    name="names[]"
                    placeholder="Név"
                    required
                >
            </td>
            <td>
                <input
                    v-model="field.email"
                    type="email"
                    name="emails[]"
                    placeholder="E-mail"
                    required
                >
            </td>
            <td>
                <a @click="removeField(index)" class="delete_btn"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        </table>
        </div>

    </div>
</template>

<script>
export default {
    name: 'contactadd',
    components: {
        
    },
    data() {
        return {
            fields: []
        }
    },
    created() {
        
    },
    methods: {
        addNewField() {
            this.fields.push({
                names: '',
                emails: ''
            });
        },
        removeField(index) {
            this.fields.splice(index, 1);
        }
    }
}
</script>

<style scoped>

</style>