<template>

    <el-col :span="16" :offset="4">
        <el-card class="box-card" :body-style="{ padding: '0px'}">
            
            <form-wizard 
                    ref="formClient"
                    @on-complete="onComplete"
                    @on-loading="setLoading"
                    shape="circle" color="#20a0ff"
                    back-button-text="BACK"
                    next-button-text="NEXT"
                    finish-button-text="SUBMIT">

                <div slot="title">
                    <h2 class="font-weight">CLIENT LOGBOOK</h2>
                    <h4>DOST Technical Support Services Division</h4>
                    <h6>This information will let us know more about you.</h6>
                </div>

                <tab-content title="Personal Details" icon="el-icon-user" :before-change="stepOne">
                    <el-form :inline-message="true" :status-icon="true" :model="client" class="mt-3" :rules="rules" ref="stepOne" label-width="180px">  
                        
                        <el-row class="mb-4">
                            <el-col :span="12" :offset="6" class="text-center">
                                <h5>Please tell us more about yourself.</h5>
                            </el-col>
                        </el-row>

                        <!-- Client Name -->
                        <el-row>
                            <el-col :span="11">
                                <el-form-item label="Name" prop="lastname" class="mb-0">
                                    <el-input v-model="client.lastname" placeholder="Last name" v-uppercase></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col :span="6">
                                <el-form-item prop="firstname" class="mb-2" label-width="10px">
                                    <el-input v-model="client.firstname" placeholder="First name" v-uppercase></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col :span="3">
                                <el-form-item prop="mi" class="mb-2" label-width="10px">
                                    <el-input v-model="client.mi" placeholder="MI" v-uppercase></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <!-- Sex -->
                        <el-row>
                            <el-col>
                                <el-form-item label="Sex" prop="gender" class="mb-2">

                                    <!-- Male Card -->
                                    <el-col :span="6" :offset="3" class="mr-2">
                                        <el-card shadow="hover" :body-style="{ padding: '10px'}" 
                                            :class="client.gender === 'Male' ? 'bg-info shadow' : ''" v-on:click.native="client.gender = 'Male'">
                                            <el-image
                                                :src="'/images/walkin/q1-male.png'"
                                                ></el-image>
                                            <div class="text-center">Male</div>
                                        </el-card>
                                    </el-col>

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
                            <el-col :span="20">
                                <el-form-item label="Age Group" prop="age_group">    
                                    <el-select v-model="client.age_group" placeholder="Select age group" style="width: 100%;">
                                        <el-option value="Below 10">Below 10</el-option>
                                        <el-option value="10 - 15">10 - 15</el-option>
                                        <el-option value="16 - 20">16 - 20</el-option>
                                        <el-option value="21 - 30">21 - 30</el-option>
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
                            <el-col :span="20">
                                <el-form-item label="Email" prop="email" class="mb-0">
                                    <el-input type="email" v-model="client.email" placeholder="Please input here (optional)"></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col :span="20">
                                <el-form-item label="Mobile number" prop="mobile_number" class="mb-0">
                                    <el-input maxlength="11" v-model="client.mobile_number" placeholder="Please input here"></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col :span="20">
                                <el-form-item label="Address" prop="client_address" class="mb-0">
                                    <el-select 
                                        v-model="client.client_address"
                                        filterable 
                                        remote 
                                        clearable
                                        placeholder="Search address"
                                        :remote-method="getRemoteAddress"
                                        :loading="loading"
                                        style="width: 100%;">
                                        <el-option
                                            v-for="address in addressList"
                                            :key="address.value"
                                            :label="address.label"
                                            :value="address.value"
                                            ></el-option>
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
                            <el-col :span="20">
                                <el-form-item label="Services" prop="services" class="mb-0">    
                                    <el-select v-model="client.services" placeholder="Inquire Services" style="width: 100%;" @change="inquireServices">
                                        <el-option label="Scholarship" value="0">Scholarship</el-option>
                                        <el-option label="GIA Special Projects" value="1">GIA Special Projects</el-option>
                                        <el-option label="Others" value="2">Others</el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                            
                            <!-- Scholarship Projects -->
                            <el-col :span="20">
                                <el-form-item label="" prop="scholarship_checklist" v-if="client.services =='0'" class="">
                                    <el-checkbox-group v-model="client.scholarship_checklist" size="medium">
                                        <el-checkbox-button label="Apply for a scholarship"></el-checkbox-button>
                                        <el-checkbox-button label="Inquire for a scholarship"></el-checkbox-button>
                                        <el-checkbox-button label="Inquire stipend"></el-checkbox-button>
                                        <el-checkbox-button label="Notice of Award"></el-checkbox-button>
                                        <el-checkbox-button label="Submit documents"></el-checkbox-button>
                                    </el-checkbox-group>
                                </el-form-item>
                            </el-col>
                            
                            <!-- GIA Special Projects -->
                            <el-col :span="20">
                                <el-form-item label="" prop="gia_checklist" v-if="client.services =='1'" class="mb-0">
                                    <el-checkbox-group v-model="client.gia_checklist" size="medium">
                                        <el-checkbox-button label="Food Safety Campaign"></el-checkbox-button>
                                        <el-checkbox-button label="Food Establishment Inspection and Grading System"></el-checkbox-button>
                                        <el-checkbox-button label="Innovation and Makerspaces"></el-checkbox-button>
                                        <el-checkbox-button label="Packaging and Labeling"></el-checkbox-button>
                                        <el-checkbox-button label="Nutrifacts and Shelf-life Analysis"></el-checkbox-button>
                                        <el-checkbox-button label="STARBOOKS"></el-checkbox-button>
                                        <el-checkbox-button label="S&T Operations for Risk Reduction Management"></el-checkbox-button>
                                    </el-checkbox-group>
                                </el-form-item>
                            </el-col>

                            <!-- Other Services -->             
                            <el-col :span="20">
                                <el-form-item label="Others" prop="other_services" v-if="client.services =='2'" class="mb-0">
                                    <el-input v-model="client.other_services" placeholder="Please input here" autofocus="" v-uppercase></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <!-- School/Organization -->
                        <el-row>
                            <el-col :span="20">
                                <el-form-item label="School/Organization" prop="organization" class="mb-0">
                                    <el-input v-model="client.organization" placeholder="Please input here (optional)" v-uppercase></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <!-- Year Level if applicable -->
                        <el-row>
                            <el-col :span="14" v-if="scholarship" class="mb-0">
                                <el-form-item label="Year Level" prop="year_level">
                                    <el-input v-model="client.year_level" style="width: 100%;" placeholder="(only if applicable)"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <!-- Organization -->
                        <el-row>
                            <el-col :span="14">
                                <el-form-item label="Type" prop="organization_type" class="mb-0">
                                    <el-select v-model="client.organization_type" placeholder="Select organization type (optional)" style="width: 100%;">
                                        <el-option label="Government" value="Government"></el-option>
                                        <el-option label="Non-Government" value="Non-Government"></el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                        </el-row>
                    </el-form>
                </tab-content>

                <template slot="footer" slot-scope="props">
                    <div class="wizard-footer-left">
                        <wizard-button v-if="props.activeTabIndex > 0" @click.native="props.prevTab()" :style="props.fillButtonStyle">Previous</wizard-button>
                    </div>
                    <div class="wizard-footer-right">
                        <wizard-button @click.native="resetForm" class="btn btn-outline-secondary">Reset</wizard-button>

                        <wizard-button v-if="!props.isLastStep" @click.native="props.nextTab()" class="wizard-footer-right" :style="props.fillButtonStyle">Next</wizard-button>
                        <wizard-button v-else @click.native="onComplete" class="wizard-footer-right finish-button" :style="props.fillButtonStyle">{{props.isLastStep ? 'Submit' : 'Next'}}</wizard-button>
                    </div>
                </template>

                <div class="loader" v-if="loadingWizard"></div>
            </form-wizard>

            <!-- QUEUE CODE DIALOG -->
            <el-dialog
                :visible.sync="dialogOpen"
                width="30%"
                center>
                
                <div class="text-center">
                    <h1 class="font-weight" style="font-size: 50px;">{{ result.queue }}</h1>
                    <h4>Hi <b>{{ result.name }}</b>!</h4>
                    <h4><br>This is your queue code. 
                        <br>Please use this code upon answering our 
                        <br><i>Customer Satisfaction Survey</i>. 
                        <br>Thank you.</h4>
                </div>

                <span slot="footer" class="dialog-footer">
                    <el-button type="primary" @click="dialogOpen = false">OK</el-button>
                </span>
            </el-dialog>
            <!-- END QUEUE CODE DIALOG -->

        </el-card>

        <el-avatar 
            shape="square" 
            style="position: fixed; top: 20px; right: 50px;"
            :size="100" 
            :fit="fill" 
            :src="'https://fuss10.elemecdn.com/e/5d/4a731a90594a4af544c0c25941171jpeg.jpeg'">
        </el-avatar>
    </el-col>
</template>

<script>
    import apiClient from '../../assets/js/api/client'

    export default {
        directives: {
            uppercase: {
                bind: function (el) {
                    el.addEventListener('keyup', (e) => {
                        e.target.value = e.target.value.toUpperCase();
                    })
                }
            }
        },
        data() {
            return {
                saving: false,
                loading: false,
                loadingWizard: false,
                dialogOpen: false,
                scholarship: false,
                addressList: [],
                result: [],
                client: {
                    client_address: '',
                    services: null,
                    gia_checklist: [],
                    scholarship_checklist: [],
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
                    gia_checklist: [{
                        required: true, message: 'Please select atleast one service', trigger: 'blur'
                    }],
                    scholarship_checklist: [{
                        required: true, message: 'Please select atleast one service', trigger: 'blur'
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
                    client_address: [
                        { required: true, message: 'Please provide address', trigger: 'blur' }
                    ],
                    mobile_number: [
                        { required: true, message: 'Please provide mobile number', trigger: 'blur' },
                        { min: 11, max: 11, message: 'Length must be 11 digits', trigger: ['blur', 'change'] },
                    ]
                },
            }
        },
        computed: {
            splitAddress() {
                var address = this.client.client_address.split('|')
                this.client.barangay_code = address[0]
                this.client.municipality_code = address[1]
                this.client.province_code = address[2]
            }
        },
        methods: {
            getRemoteAddress(query){
                if(query !== '') {
                    this.loading = true;
                    setTimeout(() => {
                        this.loading = false;
                        axios
                            .get('/api/addresses?address=' + query)
                            .then((response) => {
                                this.addressList = response.data;

                                // var address = this.clientAddress.split('|')
                                // this.client.province_code = address[2]
                                // this.client.municipality_code = address[1]
                                // this.client.barangay_code = address[0]

                                // console.log(address)
                            })
                            .catch(error => {
                                callback(error, error.response.data);
                            });
                    }, 200);
                } else {
                    this.addressList = [];
                }
            },
            inquireServices: function() {
                // clear fields on change
                if (this.client.services == 0) // 0 - Scholarship
                    this.scholarship = true;
                else
                    this.scholarship = false;

                this.client.gia_checklist = [];
                this.client.scholarship_checklist = [];
                this.client.other_services = null;
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
            resetForm: function() {
                this.$refs.formClient.reset();
                this.$refs.stepOne.resetFields();
                this.$refs.stepTwo.resetFields();
                this.$refs.stepThree.resetFields();
            },
            onComplete: function() {
                this.saving = true
                apiClient.create(this.client)
                    .then((response) => {

                        // console.log(response.data.data);
                        this.result = response.data.data;
                        
                        this.$notify({
                            title: 'Success',
                            message: 'Information successfully saved!',
                            type: 'success'
                        });

                        // this.$alert(
                        //     '<strong>This is <i>HTML</i> string</strong>', 
                        //     'HTML String', {
                        //     dangerouslyUseHTMLString: true
                        // });

                        // this.dialogOpen = false;

                        this.resetForm();

                        // this.$refs.formClient.reset();
                        // this.$refs.stepOne.resetFields();
                        // this.$refs.stepTwo.resetFields();
                        // this.$refs.stepThree.resetFields();
                    })
                    .catch((e) => {
                        this.$notify({
                            title: 'Error',
                            message: 'There was an issue saving the data.',
                            type: 'error'
                        });
                    })
                    .then(() => this.saving = false)
            },
            setLoading: function(value) {
                this.loadingWizard = value
            },
        }
    }
</script>

<style>
    label {
        font-weight: bold;
    }
</style>
