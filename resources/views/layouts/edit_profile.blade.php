<!-- modal -->
<div class="container">
    <div class="add">
        <div id="edit_profile" class="modal edit_profile" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button
                            id="btn-close-edit"
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            onclick="closeModalEdit();"
                        ></button>
                    </div>

                    <h5 class="modal-title text-center">Edit Profile</h5>

                    <div class="modal-body">
                        <form action="{{route('userUpdateProfile',auth('web')->user()->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input
                                name="image"
                                type="file"
                                class="form-control"
                                id="inputGroupFile01"
                            />
                            <input
                                name="staff_id"
                                type="number"
                                class="form-control"
                                id="inputEmail3"
                                placeholder="ID"
                                value="{{$user->staff_id}}"
                            />
                            <input
                                name="name"
                                type="text"
                                class="form-control"
                                placeholder=" Name"
                                aria-label="First name"
                                value="{{$user->name}}"
                            />
                            <input
                                name="email"
                                type="email"
                                class="form-control"
                                id="inputEmail3"
                                placeholder="Email"
                                value="{{$user->email}}"
                            />
                            <div class="modal-footer">
                                <button type="submit" class="clos" data-bs-dismiss="modal">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
