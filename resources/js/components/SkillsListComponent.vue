<template>
    
    <div>
        <ul class="flex flex-wrap justify-center">
        <li
                class="border border-gray-700 px-10 py-3 mb-3 rounded mr-4 cursor-pointer"
                :class="verificarActive(skill)"
                v-for="( skill, i) in this.skills"
                v-bind:key="i"
                v-on:click="activar($event)"
            > {{ skill }} </li>
        </ul>

        <input type="hidden" name="skills" id="skills">
    </div>
</template>


<script>
    export default {
        props: ['skills', 'oldskills'],
        data: function() {
            return {
                selectedSkills: new Set()
            }
        },
        created: function()
        {
            if(this.oldskills) {
                let skillsArray = this.oldskills.split(',');
                skillsArray.forEach( skill => {
                    ('Adding')
                    this.selectedSkills.add(skill)
                });

            }
        },
        mounted() {
            console.log(this.skills);
            console.log(this.oldskills)
            // Set the skills that the user selected before the form reload
            document.querySelector('#skills').value = this.oldskills;
        },
        methods: {
            activar(e) {
                console.log('click', e.target.textContent)

                if( e.target.classList.contains('bg-gray-400')) {
                    // Quitar el estilo de seleccionado
                    e.target.classList.remove('bg-gray-400');
                    // Quitar de el set de skills si se deselecciona
                    this.selectedSkills.delete(e.target.textContent)
                } else {
                    // Agregar el estilo de seleccionado
                    e.target.classList.add('bg-gray-400');
                    // Agregar al set de skills
                    this.selectedSkills.add(e.target.textContent)
                }

                // Agregar las skills al input hidden
                const stringHabilidades = [...this.selectedSkills]
                document.querySelector('#skills').value = stringHabilidades;
            },
            verificarActive(skill) {
                console.log('Selecting: ', skill)
                return this.selectedSkills.has(skill) ? 'bg-gray-400' : "";
            }
        }

    }
</script>