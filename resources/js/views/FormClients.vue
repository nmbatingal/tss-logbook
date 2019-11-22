<template>

    <div class="row">
        <div class="col-md-12">
            <form @submit.prevent="onSubmit($event)" method="post" class="form-horizontal form-bordered mt-5">
                <div class="form-body">

                    <!-- Services group -->
                    <div class="form-group row">
                        <label class="control-label col-md-3">Inquiry</label>
                        <div class="col-md-3">
                            <select v-model='client.services' name="services" class="form-control custom-select" required>
                                <option value="" selected>Select services to inquire</option>
                                <option value="Scholarship">Scholarship</option>
                                <option value="Others">Others</option>
                            </select>
                            <small class="form-control-feedback">Services</small> 
                        </div>
                        <div class="col-md-3" v-if='client.services=="Others"'>
                            <input v-model='client.other_services' name="other_services" type="text" placeholder="Other services" class="form-control" required>
                            <small class="form-control-feedback"></small> 
                        </div>
                    </div>

                    <!-- Name group-->
                    <div class="form-group row">
                        <label class="control-label col-md-3">Name</label>
                        <div class="col-md">
                            <input v-model='client.lastname' name="lastname" type="text" placeholder="Lastname" class="form-control" required>
                            <small class="form-control-feedback"></small> 
                        </div>
                        <div class="col-md">
                            <input v-model='client.firstname' name="firstname" type="text" placeholder="Firstname" class="form-control" required>
                            <small class="form-control-feedback"></small> 
                        </div>
                        <div class="col-md-2">
                            <input v-model='client.mi' name="mi" type="text" placeholder="MI" class="form-control">
                            <small class="form-control-feedback"></small> 
                        </div>
                    </div>

                    <!-- Age group-->
                    <div class="form-group row">
                        <label class="control-label col-md-3">Age group</label>
                        <div class="col-md-3">
                            <select v-model='client.age_group' name="age_group" class="form-control custom-select" required>
                                <option value="" selected>Select age group</option>
                                <option value="Below 10">Below 10</option>
                                <option value="10 - 15">10 - 15</option>
                                <option value="16 - 20">16 - 20</option>
                                <option value="31 - 40">21 - 30</option>
                                <option value="31 - 40">31 - 40</option>
                                <option value="41 - 50">41 - 50</option>
                                <option value="51 - 60">51 - 60</option>
                                <option value="Above 60">Above 60</option>
                            </select>
                        </div>
                        <label class="control-label col-md-2">Gender</label>
                        <div class="col-md-2">
                            <div class="custom-control custom-radio">
                                <input v-model='client.gender' name="gender" type="radio" id="customRadio11" value="Male" class="custom-control-input" required>
                                <label class="custom-control-label" for="customRadio11">Male</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="custom-control custom-radio">
                                <input v-model='client.gender' name="gender" type="radio" id="customRadio12" value="Female" class="custom-control-input" required>
                                <label class="custom-control-label" for="customRadio12">Female</label>
                            </div>
                        </div>
                    </div>

                    <!-- Contact group-->
                    <div class="form-group row">
                        <label class="control-label col-md-3">Contact</label>
                        <div class="col-md">
                            <input v-model='client.email' name="email" type="text" placeholder="Email" class="form-control">
                            <small class="form-control-feedback"></small> 
                        </div>
                        <div class="col-md">
                            <input v-model='client.mobile_number' name="mobile_number" type="text" placeholder="Contact number" class="form-control">
                            <small class="form-control-feedback"></small> 
                        </div>
                    </div>

                    <!-- Organization group-->
                    <div class="form-group row">
                        <label class="control-label col-md-3">School/Organization</label>
                        <div class="col-md">
                            <input v-model='client.organization' name="organization" type="text" placeholder="School/Organization" class="form-control" required>
                            <small class="form-control-feedback"></small> 
                        </div>
                    </div>

                    <!-- Type group-->
                    <div class="form-group row">
                        <label class="control-label col-md-3">Organization Type</label>
                        <div class="col-md-2">
                            <div class="custom-control custom-radio">
                                <input v-model='client.organization_type' name="organization_type" type="radio" id="governmentRadio" value="Government" class="custom-control-input" required>
                                <label class="custom-control-label" for="governmentRadio">Government</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="custom-control custom-radio">
                                <input v-model='client.organization_type' name="organization_type" type="radio" id="privateRadio" value="Non-government" class="custom-control-input" required>
                                <label class="custom-control-label" for="privateRadio">Non-government</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="custom-control custom-radio">
                                <input v-model='client.organization_type' name="organization_type" type="radio" id="otherRadio" value="Others" class="custom-control-input" required>
                                <label class="custom-control-label" for="otherRadio">Others</label>
                            </div>
                        </div>
                        <div class="col-md" v-if='client.organization_type=="Others"'>
                            <div class="custom-control custom-radio">
                                <input v-model='client.other_org_type' name="other_org_type" type="text" placeholder="Other type of organization" class="form-control" required>
                                <small class="form-control-feedback"></small> 
                            </div>
                        </div>
                    </div>

                    <!-- Address group-->
                    <div class="form-group row">
                        <label class="control-label col-md-3">Address</label>
                        <div class="col-md">
                            <select v-model='client.province_code' name="province_code" @change='getMunicipality()' class="form-control custom-select">
                                <option value="" >Select province</option>
                                <option v-for="province in provinces" :key="province.code" :value="province.code">{{ province.name }}</option>
                            </select>
                            <small class="form-control-feedback">Province</small> 
                        </div>
                        <div class="col-md">
                            <select v-model='client.municipality_code' name="municipality_code" @change='getBarangay()' class="form-control custom-select">
                                <option value="" >Select City/Municipality</option>
                                <option v-for="municipality in municipalities" :key="municipality.code" :value="municipality.code">{{ municipality.name }}</option>
                            </select>
                            <small class="form-control-feedback">City/Municipality</small> 
                        </div>
                        <div class="col-md">
                            <select v-model='client.barangay_code' name="barangay_code" class="form-control custom-select">
                                <option value="" >Select Barangay</option>
                                <option v-for="barangay in barangays" :key="barangay.code" :value="barangay.code">{{ barangay.name }}</option>
                            </select>
                            <small class="form-control-feedback">Barangay</small> 
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="offset-sm-3 col-md-2">
                                    <button type="submit" :disabled="saving" class="btn btn-block btn-success">{{ saving ? 'Submitting...' : 'Submit' }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> 
</template>

<script>
    import apiClient from '../../assets/js/api/client';

    export default {
        data() {
            return {
                message: null,
                error: null,
                saving: false,
                provinces: [],
                municipalities: [],
                barangays: [], 
                client: {
                    services: '',
                    other_services: '',
                    lastname: '',
                    firstname: '',
                    mi: '',
                    age_group: '',
                    gender: '',
                    email: '',
                    mobile_number: '',
                    organization: '',
                    organization_type: '',
                    other_org_type: '',
                    province_code: '',
                    municipality_code: '',
                    barangay_code: '',
                }
            };
        },
        created() {
            // $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
        },
        methods: {
            getProvinces: function(){
                axios
                    .get('/api/provinces')
                    .then((response) => {
                        this.provinces = response.data
                        this.municipality_code = "";
                        this.municipalities = [];
                        this.barangay = "";
                        this.barangays = [];
                    })
                    .catch(error => {
                        callback(error, error.response.data);
                    });
            },
            getMunicipality: function(){
                axios
                    .get(`api/provinces/${this.client.province_code}`)
                    .then((response) => {
                        this.municipalities = response.data;
                        this.barangay = "";
                        this.barangays = [];
                    })
                    .catch(error => {
                        callback(error, error.response.data);
                    });
            },
            getBarangay: function(){
                axios
                    .get(`api/provinces/${this.client.province_code}/${this.client.municipality_code}`)
                    .then((response) => {
                        // this.municipalities = response.data;
                        this.barangays = response.data;
                    })
                    .catch(error => {
                        callback(error, error.response.data);
                    });
            },
            onSubmit($event) {
                this.saving = true
                this.message = false
                apiClient.create(this.client)
                    .then((response) => {
                        // this.$router.push({ name: 'users.edit', params: { id: response.data.data.id } });
                        alert("ok");
                    })
                    .catch((e) => {
                        this.message = e.response.data.message || 'There was an issue creating the user.';
                    })
                    .then(() => this.saving = false)
            }
        },
        created() {
            this.getProvinces();
        },
    }
</script>