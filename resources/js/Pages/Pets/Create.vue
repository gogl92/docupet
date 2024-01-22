<script setup>
import Toolbar from "primevue/toolbar";
import InputText from "primevue/inputtext";
import Dropdown from "primevue/dropdown";
import SelectButton from "primevue/selectbutton";
import RadioButton from 'primevue/radiobutton';
import Button from 'primevue/button';
import axios from "axios";
import {ref} from "vue";
import Toast from "primevue/toast";
import {useToast} from 'primevue/usetoast';

const toast = useToast()
let breeds = ref([])

const types = ref([
    'Dog',
    'Cat'
]);

const genders = ref([
   'Female',
    'Male'
]);

const disabled = ref(false);

const pet = ref({});

function next() {
    // Send the form data to the server using axios
    axios.post('/pets/store', pet.value)
        .then(response => {
            toast.add({
                severity: 'success',
                summary: 'Pet Successfully saved',
                detail: response.data,
                life: 3000
            });

            // Clear the form
            pet.value = {
                'name': '',
                'type': '',
                'breed': '',
                'gender': ''
            };
        })
        .catch(error => {
            const errors = error.response.data.errors;
            let detail = '';
            Object.keys(errors).forEach(key => {
                detail += ' ' + errors[key].join(' ');
            });
            toast.add({severity: 'error', summary: 'Error saving the pet', detail: detail, life: 3000});
        })
}

function getBreeds() {
    axios.get('/breeds/' + pet.value.type)
        .then(response => {
            const breedsResponse = response.data;
            breeds.value = [];
            breedsResponse.forEach(breed => {
                breeds.value.push(breed.name);
            });

            breeds.value.push('Can\'t find it?');
        })
        .catch(error => {
            console.log(error);
        })
}

</script>
<template>
    <div>
        <Toast/>
        <!-- Header -->
        <div class="header">
            <div class="card">
                <Toolbar>
                    <template #start>
                    </template>

                    <template #center>
                        <img class="menu-logo" alt="Logo"
                             src="https://www.docupet.com/wp-content/uploads/2019/05/docupet-logo-sm-shelter.png"/>
                    </template>

                    <template #end>
                        <div class="menu-items">
                            <span class="font-bold">Help</span>
                            <span class="font-bold">Save and Finish Later</span>
                        </div>
                    </template>
                </Toolbar>
            </div>
        </div>

        <!-- Body -->
        <div class="body">
            <div>
                <img class="paws" src="https://m.media-amazon.com/images/I/61ucVY54GzL._AC_UF894,1000_QL80_.jpg" alt="Paws" />
                <img class="paws" src="https://m.media-amazon.com/images/I/61ucVY54GzL._AC_UF894,1000_QL80_.jpg" alt="Paws" />
                <img class="paws" src="https://m.media-amazon.com/images/I/61ucVY54GzL._AC_UF894,1000_QL80_.jpg" alt="Paws" />
                <img class="paws" src="https://m.media-amazon.com/images/I/61ucVY54GzL._AC_UF894,1000_QL80_.jpg" alt="Paws" />
                <img class="paws" src="https://m.media-amazon.com/images/I/61ucVY54GzL._AC_UF894,1000_QL80_.jpg" alt="Paws" />
                <img class="paws" src="https://m.media-amazon.com/images/I/61ucVY54GzL._AC_UF894,1000_QL80_.jpg" alt="Paws" />
                <img class="paws" src="https://m.media-amazon.com/images/I/61ucVY54GzL._AC_UF894,1000_QL80_.jpg" alt="Paws" />
                <img class="paws" src="https://m.media-amazon.com/images/I/61ucVY54GzL._AC_UF894,1000_QL80_.jpg" alt="Paws" />
                <h2>Tell us about your Pet</h2>
                <div class="flex flex-column gap-2">
                    <label for="petName">Pet Name</label>
                    <InputText id="petName" v-model="pet.name" aria-describedby="petName-help"
                               placeholder="your dog or cat name"/>
                </div>
                <div class="flex flex-column gap-2">
                    <label for="type">Type</label>
                    <SelectButton v-model="pet.type" :options="types" aria-labelledby="basic" @change="getBreeds"/>
                </div>
                <div class="flex flex-column gap-2">
                    <label for="breed">Breed</label>
                    <Dropdown id="breed" v-model="pet.breed" aria-describedby="breed-help" :options="breeds" :filter-fields="['name']"
                              placeholder="Select a breed"/>
                </div>
                <div class="flex flex-wrap gap-3" v-if="pet.breed == 'Can\'t find it?' || pet.breed == 'idk' || pet.breed == 'mix'">
                    <div class="flex align-items-center">
                        <RadioButton v-model="pet.breed" inputId="idk" name="idk" value="idk"/>
                        <label for="idk" class="ml-2">I don't know</label>
                    </div>
                    <div class="flex align-items-center">
                        <RadioButton v-model="pet.breed" inputId="mix" name="mix" value="mix"/>
                        <label for="mix" class="ml-2">It's a mix</label>
                    </div>
                </div>
                <div class="flex flex-column gap-2">
                    <label for="type">Gender</label>
                    <SelectButton v-model="pet.gender" :options="genders" aria-labelledby="basic"/>
                </div>
                <div>
                    <div class="flex flex-column gap-2">
                        <!-- call a function to save the form -->
                        <Button label="Continue" :disabled="disabled" @click="next"/>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Footer DocuPet &copy; {{ new Date().getFullYear() }}</p>
        </div>
    </div>
</template>
