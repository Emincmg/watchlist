@section('scripts')
    <script type="text/javascript">

        //Add movie
        $(document).on('click', '#add-button', async function () {

            let tmdb_id = $(this).data("id");
            Swal.showLoading(Swal.getDenyButton());


            //Check if movie already exists
            $.ajax({
                url: '/check-movie/' + tmdb_id,
                type: 'GET',
                success: function (response){

                    //Insert movie if it does not already exist
                    $.ajax({
                        url: '/insert/' + tmdb_id,
                        type: 'GET',
                        success: function () {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Movie saved',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        },
                        error: function (xhr, status, error) {
                            let err = JSON.parse(xhr.responseText)
                            Swal.fire({
                                title: "Error!",
                                text: err.message,
                                icon: 'error',
                                confirmButtonText: 'Confirm',
                                confirmButtonColor: '#052E45',

                            });
                        }
                    });
                },
                error: function (xhr, status, error) {
                    let err = JSON.parse(xhr.responseText)
                    Swal.fire({
                        title: "Error!",
                        text: err.message,
                        icon: 'error',
                        confirmButtonText: 'Confirm',
                        confirmButtonColor: '#052E45',
                    });
                }

            })
        });

        //Delete book
        $(document).on('click', '#deleteButton', function () {
            let tmdb_id = $(this).data("id");
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#052E45',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/delete/' + tmdb_id,
                        type: 'GET'
                    })
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Book deleted!',
                        icon: 'success',
                        confirmButtonColor: '#052E45',
                        didClose: function () {
                            location.reload();
                        }
                    })
                }
            })

        });

        //Edit Profile
        function previewProfilePhoto(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const previewImage = document.getElementById('image');
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).on('submit', '#editProfileForm', function (e) {
            e.preventDefault();
            Swal.showLoading();
            $.ajax({
                url: 'editprofile-post',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    Swal.fire({
                        title: 'Changed!',
                        text: 'Your profile has been modified.',
                        icon: 'success',
                        confirmButtonText: 'Confirm',
                        confirmButtonColor: '#052E45',
                    });
                },
                error: function (xhr, status, error) {
                    let err = JSON.parse(xhr.responseText)
                    Swal.fire({
                        title: "Error!",
                        text: err.message,
                        icon: 'error',
                        confirmButtonText: 'Confirm',
                        confirmButtonColor: '#052E45',
                    });
                }
            })
        })
    </script>

@endsection
