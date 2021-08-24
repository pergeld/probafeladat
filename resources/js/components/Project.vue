<template>
    <div>
        <div class="search_div">
            Szűrés:
            <select v-model="statusfilter" @change="fetchProject">
                <option value="">Összes</option>
                <option value="fejlesztésre vár">Fejlesztésre vár</option>
                <option value="folyamatban">Folyamatban</option>
                <option value="kész">Kész</option>
            </select>
        </div>
        <table id="maintable" class="main_table">
                <thead class="">
                    <tr>
                        <th>Projekt neve</th>
                        <th>Státusz</th>
                        <th>Kapcsolattartók száma</th>
                        <th colspan="2">Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="project in projects" :key="project.id" >
                        <td>{{ project.title }}</td>
                        <td>{{ project.status }}</td>
                        <td>
                            <span v-for="contact in project.contacts" :key="contact.id"></span>
                            {{ project.contacts.length }}
                        </td>
                        <td><a @click="editProjectLink(project)" class="edit_btn"><i class="fas fa-edit"></i></a></td>
                        <td><a @click="deleteProject(project.id)" class="delete_btn"><i class="fas fas fa-trash-alt"></i></a></td>
                    </tr>
                </tbody>
            </table>
    </div>
</template>

<script>
export default {
    name: 'contact',
    components: {
        
    },
    data() {
        return {
            projects: [],
            project: {
                id: '',
                title: '',
                description: '',
                status: ''
            },
            statusfilter: ''
        }
    },
    created() {
        this.fetchProject();
    },
    methods: {
        fetchProject() {
            axios.get(`/api/projects`, {
                params: {
                    filter: this.statusfilter
                }
            })
                .then(response => {
                    this.projects = response.data;
                });
        },
        deleteProject(id) {
            axios.delete(`/api/projects/${id}`)
                .then(response => {
                    let i = this.projects.map(data => data.id).indexOf(id);
                    this.projects.splice(i, 1)
                });
        },
        editProjectLink(project){
            window.location.href = '/projects/' + project.id + '/edit';
        }
    }
}
</script>

<style scoped>

</style>