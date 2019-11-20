<template>

    <div class="row">
        <div class="col-md-12">
            <form action="#" method="post" class="form-horizontal form-bordered mt-5">
                <div class="form-body">
                    <!-- Name group-->
                    <div class="form-group row">
                        <label class="control-label col-md-3">Name</label>
                        <div class="col-md">
                            <input name="firstname" type="text" placeholder="Firstname" class="form-control" required>
                            <small class="form-control-feedback"></small> 
                        </div>
                        <div class="col-md">
                            <input name="mi" type="text" placeholder="MI" class="form-control">
                            <small class="form-control-feedback"></small> 
                        </div>
                        <div class="col-md">
                            <input name="lastname" type="text" placeholder="Lastname" class="form-control" required>
                            <small class="form-control-feedback"></small> 
                        </div>
                    </div>

                    <!-- Age group-->
                    <div class="form-group row">
                        <label class="control-label col-md-3">Age group</label>
                        <div class="col-md-3">
                            <select name="age_group" class="form-control custom-select" required>
                                <option value="">Select age group</option>
                                <option value="Below 10">Below 10</option>
                                <option value="10 - 15">10 - 15</option>
                                <option value="16 - 20">16 - 20</option>
                                <option value="31 - 40">31 - 40</option>
                                <option value="41 - 50">41 - 50</option>
                                <option value="51 - 60">51 - 60</option>
                                <option value="Above 60">Above 60</option>
                            </select>
                        </div>
                    </div>

                    <!-- Gender group-->
                    <div class="form-group row">
                        <label class="control-label col-md-3">Gender</label>
                        <div class="col-md-3">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio11" name="gender" value="Male" class="custom-control-input" required>
                                <label class="custom-control-label" for="customRadio11">Male</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio12" name="gender" value="Female" class="custom-control-input" required>
                                <label class="custom-control-label" for="customRadio12">Female</label>
                            </div>
                        </div>
                    </div>

                    <!-- Contact group-->
                    <div class="form-group row">
                        <label class="control-label col-md-3">Contact</label>
                        <div class="col-md">
                            <input name="email" type="text" placeholder="Email" class="form-control">
                            <small class="form-control-feedback"></small> 
                        </div>
                        <div class="col-md">
                            <input name="contact_number" type="text" placeholder="Contact number" class="form-control">
                            <small class="form-control-feedback"></small> 
                        </div>
                    </div>

                    <!-- Organization group-->
                    <div class="form-group row">
                        <label class="control-label col-md-3">School/Organization</label>
                        <div class="col-md">
                            <input name="organization" type="text" placeholder="School/Organization" class="form-control" required>
                            <small class="form-control-feedback"></small> 
                        </div>
                    </div>

                    <!-- Type group-->
                    <div class="form-group row">
                        <label class="control-label col-md-3">Organization Type</label>
                        <div class="col-md-3">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="governmentRadio" name="orgTypeRadio" value="Government" class="custom-control-input" required>
                                <label class="custom-control-label" for="governmentRadio">Government</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="privateRadio" name="orgTypeRadio" value="Non-government" class="custom-control-input" required>
                                <label class="custom-control-label" for="privateRadio">Non-government</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="otherRadio" name="orgTypeRadio" value="Others" class="custom-control-input" required>
                                <label class="custom-control-label" for="otherRadio">Others</label>
                            </div>
                        </div>
                    </div>

                    <!-- Address group-->
                    <div class="form-group row">
                        <label class="control-label col-md-3">Address</label>
                        <div class="col-md">
                            <select v-model='province_code' name="province" @change='getMunicipality()' class="form-control custom-select">
                                <option value="">Select province</option>
                                <option v-for="province in provinces" :key="province.code" :value="province.code">{{ province.name }}</option>
                            </select>
                            <small class="form-control-feedback"></small> 
                        </div>
                        <div class="col-md">
                            <select v-model='municipality_code' name="municipality" @change='getBarangay()' class="form-control custom-select">
                                <option value="">Select City/Municipality</option>
                                <option v-for="municipality in municipalities" :key="municipality.code" :value="municipality.code">{{ municipality.name }}</option>
                            </select>
                            <small class="form-control-feedback"></small> 
                        </div>
                        <div class="col-md">
                            <input name="barangay" type="text" placeholder="Barangay" class="form-control">
                            <small class="form-control-feedback"></small> 
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="offset-sm-3 col-md-2">
                                    <button type="submit" class="btn btn-block btn-success">SUBMIT</button>
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
    // import axios from 'axios';

    export default {
        data() {
            return {
                message: null,
                error: null,
                province_code: "",
                provinces: [],
                municipality_code: "",
                municipalities: [],
                // barangay: "",
                barangays: [],
            };
        },
        created() {
            // $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
        },
        methods: {
            getCountry: function(){
                axios
                    .get('/api/provinces')
                    .then(response => (this.provinces = response.data))
                    .catch(error => {
                        callback(error, error.response.data);
                    });
            },
            getMunicipality: function(){
                axios
                    .get(`api/provinces/${this.province_code}`)
                    .then(response => (this.municipalities = response.data))
                    .catch(error => {
                        callback(error, error.response.data);
                    });
            }
        },
        created() {
            this.getCountry();
        },
    }
</script>