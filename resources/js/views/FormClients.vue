<template>
    
    <form-wizard @on-complete="onComplete" shape="circle" color="#20a0ff" error-color="#ff4949">
        <tab-content title="Personal details" icon="ti-user" :before-change="validateFirstStep">

            <input v-model='formInline.user'  type="text" placeholder="Other services" class="form-control" autofocus>

        </tab-content>
        <tab-content title="Additional Info" icon="ti-settings">
            Second tab
        </tab-content>
        <tab-content title="Last step" icon="ti-check">
            Yuhuuu! This seems pretty damn simple
        </tab-content>
    </form-wizard>

    
</template>

<script>
    import apiClient from '../../assets/js/api/client';
    //local registration
    import {FormWizard, TabContent} from 'vue-form-wizard'
    import 'vue-form-wizard/dist/vue-form-wizard.min.css'

    export default {
        //component code
        components: {
            FormWizard,
            TabContent
        },
        data() {
            return {
                formInline: {
                    user: '',
                },
                rules: {
                    user: [{
                        required: true,
                        message: 'Please input Activity name',
                        trigger: 'blur'
                    }, {
                        min: 3,
                        max: 5,
                        message: 'Length should be 3 to 5',
                        trigger: 'blur'
                    }],
                }
            }
        },
        methods: {
            onComplete: function() {
                alert('Yay. Done!');
            },
            validateFirstStep() {
                return new Promise((resolve, reject) => {
                    this.$refs.ruleForm.validate((valid) => {
                        resolve(valid);
                    });
                })

            }
        }
    }


    // export default {
    //     data() {
    //         return {
    //             message: null,
    //             error: null,
    //             saving: false,
    //             provinces: [],
    //             municipalities: [],
    //             barangays: [], 
    //             client: {
    //                 services: '',
    //                 other_services: '',
    //                 lastname: '',
    //                 firstname: '',
    //                 mi: '',
    //                 age_group: '',
    //                 gender: '',
    //                 email: '',
    //                 mobile_number: '',
    //                 organization: '',
    //                 organization_type: '',
    //                 other_org_type: '',
    //                 province_code: '',
    //                 municipality_code: '',
    //                 barangay_code: '',
    //             }
    //         };
    //     },
    //     methods: {
    //         getProvinces: function(){
    //             axios
    //                 .get('/api/provinces')
    //                 .then((response) => {
    //                     this.provinces = response.data
    //                     this.municipality_code = "";
    //                     this.municipalities = [];
    //                     this.barangay = "";
    //                     this.barangays = [];
    //                 })
    //                 .catch(error => {
    //                     callback(error, error.response.data);
    //                 });
    //         },
    //         getMunicipality: function(){
    //             axios
    //                 .get(`api/provinces/${this.client.province_code}`)
    //                 .then((response) => {
    //                     this.municipalities = response.data;
    //                     this.barangay = "";
    //                     this.barangays = [];
    //                 })
    //                 .catch(error => {
    //                     callback(error, error.response.data);
    //                 });
    //         },
    //         getBarangay: function(){
    //             axios
    //                 .get(`api/provinces/${this.client.province_code}/${this.client.municipality_code}`)
    //                 .then((response) => {
    //                     // this.municipalities = response.data;
    //                     this.barangays = response.data;
    //                 })
    //                 .catch(error => {
    //                     callback(error, error.response.data);
    //                 });
    //         },
    //         onSubmit($event) {
    //             this.saving = true
    //             this.message = false
    //             apiClient.create(this.client)
    //                 .then((response) => {
    //                     // this.$router.push({ name: 'users.edit', params: { id: response.data.data.id } });
    //                     alert("ok");
    //                 })
    //                 .catch((e) => {
    //                     this.message = e.response.data.message || 'There was an issue saving the data';
    //                 })
    //                 .then(() => this.saving = false)
    //         },
    //         validate() {
    //             return new Promise((resolve, reject) => {
    //                 this.$refs.ruleForm.validate((valid) => {
    //                     resolve(valid);
    //                 });
    //             })
    //         },
    //         onComplete: function() {
    //             alert('Yay. Done!');
    //         },
    //         validateFirstStep() {
    //             return new Promise((resolve, reject) => {
    //                 this.$refs.ruleForm.validate((valid) => {
    //                 resolve(valid);
    //                 });
    //             })
    //         }
    //     },
    //     created() {
    //         this.getProvinces();
    //     },
    // }
</script>