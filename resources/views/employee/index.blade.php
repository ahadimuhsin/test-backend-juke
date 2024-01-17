<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('employee.create') }}" class="btn btn-md btn-success mb-3">TAMBAH EMPLOYEE</a>

                        <div>
                            <form action="{{ route('employee.index') }}" method="GET">
                                <input type="text" class="form-control" name="name"
                                value="{{ request('name') }}" placeholder="Masukkan Nama">

                                <button type="submit" class="btn btn-md btn-primary">Cari</button>
                            </form>
                        </div>
                        <table class="table table-bordered mt-3">
                            <thead>
                              <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Posisi</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Bank</th>
                                <th scope="col">Nomor KTP</th>
                                <th scope="col">File KTP</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($employees as $item)
                                <tr>
                                    <td class="text-center">
                                        {{ $item->full_name }}
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td>{{ date("d-m-Y", strtotime($item->date_of_birth)) }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->address }} {{ $item->province }} {{ $item->city }} {{ $item->zip_code }}</td>
                                    <td>{{ $item->bank }} - {{ $item->bank_account }}</td>
                                    <td>{{ $item->ktp_number }} </td>
                                    <td>
                                        @if ($item->ktp)
                                        <img src="{{ asset("storage/ktp/".$item->ktp) }}" width="200" alt="">
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('employee.destroy', $item->id) }}" method="POST">
                                            <a href="{{ route('employee.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data item belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>
                          {{-- {{ $items->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');

        @endif
    </script>

</body>
</html>
