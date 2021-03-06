@extends('layouts.adminpage')
@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Staff Management</h4>
            

            <table id="tableStaffs" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Staff ID</th>
                        <th>Username</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($users as $user)
                    
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                               <button class="btn btn-icon waves-effect waves-light btn-danger m-b-5">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <a
                                id='btn-view-{{$user->id}}'
                                onclick="viewDetail({{$user->id}})" 
                                href="#custom-modal"
                                class="btn btn-icon waves-effect waves-light btn-success m-b-5 "
                                data-animation="door" 
                                data-plugin="custommodal"
                                data-overlayspeed="100" 
                                data-overlaycolor="#36404a"
                                >
                                    <i class="fa fa-eye"></i>
                                </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
<!-- Modal -->
<div id="custom-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Detail information</h4>
    <div class="custom-modal-text">
            <div class="bg-picture card-box">
                    <div class="profile-info-name row">
                        <div class='col-sm-3'>
                                <img src="{{asset('assets/images/profile.jpg')}}" class="img-thumbnail" alt="profile-image">
                                <div>
                                    <label for="file" class="btn">Change image</label>
                                    <input id="file" style="display:none" type="file">
                                </div>
                        </div>  
                        <div class='col-sm-9'>
                                <div class="profile-info-detail">
                            
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td width="35%" >Username</td>
                                                    <td width="65%"><a href="#" id='modal-username' data-type="text" data-pk="1" data-title="Enter username"
                                                            class="editable editable-click" style="">superuser</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="35%">Full name</td>
                                                    <td width="65%"><a href="#" id="modal-fullname" data-type="text" data-pk="2" data-title="Enter username"
                                                            class="editable editable-click" style="">superuser</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="35%">Adress</td>
                                                    <td width="65%"><a href="#" id="modal-address" data-type="text" data-pk="3" data-title="Enter username"
                                                            class="editable editable-click" style="">superuser</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="35%">Email</td>
                                                    <td width="65%"><a href="#" id="modal-email" data-type="text" data-pk="4" data-title="Enter username"
                                                            class="editable editable-click" style="">superuser</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Role</td>
                                                    <td><a href="#" id="modal-role" data-type="select" data-pk="1" data-value="" data-title="Select sex"
                                                            class="editable editable-click" style="color: gray;">not selected</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Date of birth</td>
                                                    <td><a href="#" id="modal-dob" data-type="combodate" data-value="1984-05-15" data-format="YYYY-MM-DD"
                                                            data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1"
                                                            data-title="Select Date of birth" class="editable editable-click">15/05/1984</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button"  class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5" onclick="Custombox.close()">Cancel</button>
                                        <button type="button" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">Save</button>

                                </div>
                        </div>
                        
                        

                        <div class="clearfix"></div>
                    </div>
                </div>
    </div>
</div>


<script>
    const viewDetail=(userid)=>{
        $.get(`/api/user/${userid}`,(data,status)=>{
            
            let {username,fullname,address,email,role,dob}=data[0]
            
             $('#modal-username').text(username) 
             $('#modal-fullname').text(fullname)  
             $('#modal-address').text(address) 
             $('#modal-email').text(email) 
             $('#modal-role').text(role) 
              $('#modal-dob').text(dob) 
        });
    }
</script>
@endsection