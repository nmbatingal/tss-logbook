<template>

<<<<<<< HEAD
    <div class="row">
        <div class="col-md-12">
            <div id="smartwizard">
                <ul>
                    <li><a href="#step-1">Step Title<br /><small>Step description</small></a></li>
                    <li><a href="#step-2">Step Title<br /><small>Step description</small></a></li>
                    <li><a href="#step-3">Step Title<br /><small>Step description</small></a></li>
                    <li><a href="#step-4">Step Title<br /><small>Step description</small></a></li>
                </ul>

                <div>
                    <div id="step-1" class="">
                        Step Content
                    </div>
                    <div id="step-2" class="">
                        Step Content
                    </div>
                    <div id="step-3" class="">
                        Step Content
                    </div>
                    <div id="step-4" class="">
                        Step Content
                    </div>
                </div>
            </div>  
        </div>

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
                        <div class="col-md" v-if='client.services=="Others"'>
                            <input v-model='client.other_services' name="other_services" type="text" placeholder="Other services" class="form-control" required autofocus>
                            <small class="form-control-feedback"></small> 
                        </div>
                    </div>
=======
    <el-col :span="12" :offset="6">
        <el-card class="box-card mt-5" :body-style="{ padding: '0px'}">
            <form-wizard v-loading="saving" 
                            ref="formClient"
                            @on-complete="onComplete"
                            shape="circle" color="#20a0ff"
                            back-button-text="BACK"
                            next-button-text="NEXT"
                            finish-button-text="SUBMIT">

                <div slot="title">
                    <h2>TSS Logbook</h2>
                    <h6>This information will let us know more about you.</h6>
                </div>
>>>>>>> elementUi

                <tab-content title="Personal Details" icon="el-icon-user" :before-change="stepOne">
                    <el-form :inline-message="true" :status-icon="true" :model="client" class="mt-3" :rules="rules" ref="stepOne" label-width="180px">  
                        
                        <el-row class="mb-4">
                            <el-col :span="12" :offset="6" class="text-center">
                                <h5>Please tell us more about yourself.</h5>
                            </el-col>
                        </el-row>

                        <!-- Client Name -->
                        <el-row>
                            <el-col>
                                <el-form-item label="Name" prop="lastname" class="mb-0">
                                    <el-input v-model="client.lastname" placeholder="Last name" ></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col>
                                <el-form-item prop="firstname" class="mb-2">
                                    <el-input v-model="client.firstname" placeholder="First name" ></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col>
                                <el-form-item prop="mi" class="mb-2">
                                    <el-input v-model="client.mi" placeholder="Middle Initial" ></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>

<<<<<<< HEAD
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
=======
                        <!-- Gender -->
                        <el-row>
                            <el-col>
                                <el-form-item label="Gender" prop="gender" class="mb-2">
>>>>>>> elementUi

                                    <!-- Male Card -->
                                    <el-col :span="6" class="mr-2">
                                        <el-card shadow="hover" :body-style="{ padding: '10px'}" 
                                            :class="client.gender === 'Male' ? 'bg-info shadow' : ''" v-on:click.native="client.gender = 'Male'">
                                            <el-image
                                                :src="'/images/walkin/q1-male.png'"
                                                ></el-image>
                                            <div class="text-center">Male</div>
                                        </el-card>
                                    </el-col>

<<<<<<< HEAD
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
                        <div class="col-md-3" v-if='client.organization_type=="Others"'>
                            <div class="custom-control custom-radio">
                                <input v-model='client.other_org_type' name="other_org_type" type="text" placeholder="Other type of organization" class="form-control" required autofocus>
                                <small class="form-control-feedback"></small> 
                            </div>
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
=======
                                    <!-- Female Card -->
                                    <el-col :span="6" class="mr-2">
                                        <el-card shadow="hover" :body-style="{ padding: '10px'}"
                                            :class="client.gender === 'Female' ? 'bg-info shadow' : ''" v-on:click.native="client.gender = 'Female'">
                                            <el-image
                                                :src="'/images/walkin/q1-female.png'"
                                                ></el-image>
                                            <div class="text-center">Female</div>
                                        </el-card>
                                    </el-col>

                                </el-form-item>
                            </el-col>
                        </el-row>
                        
                        <!-- Age group -->   
                        <el-row>          
                            <el-col>
                                <el-form-item label="Age Group" prop="age_group">    
                                    <el-select v-model="client.age_group" placeholder="Select age group" style="width: 100%;">
                                        <el-option value="Below 10">Below 10</el-option>
                                        <el-option value="10 - 15">10 - 15</el-option>
                                        <el-option value="16 - 20">16 - 20</el-option>
                                        <el-option value="31 - 40">21 - 30</el-option>
                                        <el-option value="31 - 40">31 - 40</el-option>
                                        <el-option value="41 - 50">41 - 50</el-option>
                                        <el-option value="51 - 60">51 - 60</el-option>
                                        <el-option value="Above 60">Above 60</el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                        </el-row>

                    </el-form> 

                </tab-content>

                <tab-content title="Contact Info" icon="el-icon-postcard" :before-change="stepTwo">
                    <el-form :inline-message="true" :model="client" class="mt-3" :rules="rules" ref="stepTwo" label-width="180px">  
                        
                        <el-row class="mb-4">
                            <el-col :span="12" :offset="6" class="text-center">
                                <h5>How can we contact you?</h5>
                            </el-col>
                        </el-row>

                        <!-- Contact info -->
                        <el-row>
                            <el-col>
                                <el-form-item label="Email" prop="email" class="mb-0">
                                    <el-input type="email" v-model="client.email" placeholder="Please input here"></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col>
                                <el-form-item label="Mobile number" prop="mobile_number" class="mb-0">
                                    <el-input maxlength="11" v-model="client.mobile_number" placeholder="Please input here"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <!-- Client Address -->
                        <el-row>
                            <el-col>
                                <el-form-item label="Address" prop="province_code" class="mb-0">
                                    <el-select v-model="client.province_code" placeholder="Select province" style="width: 100%;" @change="getMunicipality">
                                        <el-option v-for="province in provinces" :key="province.code" :value="province.code" 
                                            :label="province.name"></el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                            <el-col>
                                <el-form-item prop="municipality_code" class="mb-2">
                                    <el-select :disabled="client.province_code ? false : true" v-model="client.municipality_code" placeholder="Select municipality" style="width: 100%;" @change="getBarangay">
                                        <el-option v-for="municipality in municipalities" :key="municipality.code" :value="municipality.code" 
                                            :label="municipality.name"></el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                            <el-col>
                                <el-form-item prop="barangay_code">
                                    <el-select :disabled="client.municipality_code ? false : true" v-model="client.barangay_code" placeholder="Select barangay" style="width: 100%;">
                                        <el-option v-for="barangay in barangays" :key="barangay.code" :value="barangay.code" 
                                            :label="barangay.name"></el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        

                    </el-form> 

                </tab-content>

                <tab-content title="Inquire Services" icon="el-icon-tickets" :before-change="stepThree">
                    <el-form :inline-message="true" :model="client" class="mt-3" :rules="rules" ref="stepThree" label-width="180px">               
                        
                        <el-row class="mb-4">
                            <el-col :span="12" :offset="6" class="text-center">
                                <h5>What services would you like to know?</h5>
                            </el-col>
                        </el-row>

                        <el-row>
                            <!-- Inquire Services -->             
                            <el-col>
                                <el-form-item label="Inquire Services" prop="services" class="mb-0">    
                                    <el-select v-model="client.services" placeholder="Inquire Services" style="width: 100%;" @change="inquireServices">
                                        <el-option label="Scholarship" value="Scholarship"></el-option>
                                        <el-option label="Others" value="Others"></el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                            <!-- Other Services -->             
                            <el-col>
                                <el-form-item label="Others" prop="other_services" v-if="client.services =='Others'" class="mb-0">
                                    <el-input v-model="client.other_services" placeholder="Please input here" autofocus=""></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <!-- Scholarship Inquiry -->
                        <el-row>
                            <el-col>
                                <el-form-item label="School/Organization" prop="organization" class="mb-0">
                                    <el-input v-model="client.organization" placeholder="Please input here"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <!-- Organization -->
                        <el-row>
                            <el-col :span="14">
                                <el-form-item label="Type" prop="organization_type" class="mb-0">
                                    <el-select v-model="client.organization_type" placeholder="Select organization type" style="width: 100%;">
                                        <el-option label="Government" value="Government"></el-option>
                                        <el-option label="Non-Government" value="Non-Government"></el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                            <el-col :span="10" v-if="scholarship">
                                <el-form-item label="Year Level" prop="year_level">
                                    <el-input-number v-model="client.year_level" controls-position="right" :min="1" :max="20" style="width: 100%;"></el-input-number>
                                </el-form-item>
                            </el-col>
                        </el-row>
                    </el-form>
                </tab-content>
            </form-wizard>
        </el-card>
    </el-col>

>>>>>>> elementUi
</template>

<script>
    import apiClient from '../../assets/js/api/client'

    export default {
        data() {
            return {
                saving: false,
                scholarship: false,
                provinces: [],
                municipalities: [],
                barangays: [], 
                client: {
                    services: null,
                    other_services: null,
                    lastname: null,
                    firstname: null,
                    mi: null,
                    gender: null,
                    age_group: null,
                    email: null,
                    mobile_number: null,
                    year_level: null,
                    organization: null,
                    organization_type: null,
                    other_org_type: null,
                    province_code: null,
                    municipality_code: null,
                    barangay_code: null,
                },
                rules: {
                    services: [{
                        required: true, message: 'Please select a service to inquire', trigger: 'blur'
                    }],
                    other_services: [{
                        required: true, message: 'Please enter a valid input', trigger: 'blur'
                    }],
                    lastname: [{
                        required: true, message: 'Please provide your last name', trigger: 'blur'
                    }],
                    firstname: [{
                        required: true, message: 'Please provide your first name', trigger: 'blur'
                    }],
                    gender: [{
                        required: true, message: 'Please select gender', trigger: 'blur'
                    }],
                    age_group: [{
                        required: true, message: 'Please select age group', trigger: 'blur'
                    }],
                    email: [
                        { type: 'email', message: 'Please input correct email address', trigger: ['blur', 'change'] }
                    ],
                    mobile_number: [
                        { min: 11, max: 11, message: 'Length must be 11 digits', trigger: ['blur', 'change'] },
                    ],
                    organization_type: [{
                        required: true, message: 'Please select organization type', trigger: 'blur'
                    }], 
                    organization: [{
                        required: true, message: 'Please provide organization name', trigger: 'blur'
                    }],
                    province_code: [{
                        required: true, message: 'Please select a province', trigger: 'blur'
                    }],
                }
            }
        },
        created() {
            this.getProvinces();
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
            inquireServices: function() {
                // clear fields on change
                if (this.client.services == 'Scholarship')
                    this.scholarship = true;
                else
                    this.scholarship = false;

                this.client.other_services = null;
                this.client.year_level = 1;
                this.client.school = null;
            },
            stepOne() {
                return new Promise((resolve, reject) => {
                    this.$refs.stepOne.validate((valid) => {
                        resolve(valid);
                    });
                })
            },
            stepTwo() {
                return new Promise((resolve, reject) => {
                    this.$refs.stepTwo.validate((valid) => {
                        resolve(valid);
                    });
                })
            },
            stepThree() {
                return new Promise((resolve, reject) => {
                    this.$refs.stepThree.validate((valid) => {
                        resolve(valid);
                    });
                })
            },
            onComplete: function() {
                this.saving = true
                apiClient.create(this.client)
                    .then((response) => {
                        this.$notify({
                            title: 'Success',
                            message: 'Information successfully saved!',
                            type: 'success'
                        });

                        this.$refs.formClient.reset();
                        this.$refs.stepOne.resetFields();
                        this.$refs.stepTwo.resetFields();
                        this.$refs.stepThree.resetFields();
                    })
                    .catch((e) => {
                        this.$notify({
                            title: 'Error',
                            message: 'There was an issue saving the data.',
                            type: 'error'
                        });
                    })
                    .then(() => this.saving = false)
            }
<<<<<<< HEAD
        },
        created() {
            this.getProvinces();
            $('#smartwizard').smartWizard();
        },
    }
</script>

<style lang="scss" scoped>
    @import '~smartwizard/dist/css/smart_wizard.css';
    @import '~smartwizard/dist/css/smart_wizard_theme_dots.css';
</style>
=======
        }
    }
</script>

<style>
    label {
        font-weight: bold;
    }
</style>
>>>>>>> elementUi
