<div class="nk-content">
                    <div class="container-fluid">
                        <div class="nk-content-inner"> 

                        @if ($message = Session::get('success'))
                       <script>
                       const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-right',
                            iconColor: 'white',
                            customClass: {
                                popup: 'colored-toast',
                            },
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            })
                            Toast.fire({
                                icon: 'success',
                                title: 'Success',
                            })
                       </script>
                    @endif
                    @if ($message = Session::get('deleted'))
                       <script>
                       const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-right',
                            iconColor: 'white',
                            customClass: {
                                popup: 'colored-toast',
                            },
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            })
                            Toast.fire({
                                icon: 'error',
                                title: 'Deleted',
                            })
                       </script>
                    @endif
                        <livewire:account.stores.add-store/>
                        <livewire:account.stores.store-search lazy/>


            </div>
        </div>
    </div>
