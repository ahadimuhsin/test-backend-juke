<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                value="{{ old('first_name') }}" placeholder="Masukkan First Name" required>

                                <!-- error message untuk title -->
                                @error('first_name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                value="{{ old('last_name') }}" placeholder="Masukkan Last Name" required>

                                <!-- error message untuk title -->
                                @error('last_name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="Masukkan Email" required>

                                <!-- error message untuk title -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth"
                                value="{{ old('date_of_birth') }}" placeholder="Masukkan Tanggal Lahir" required>

                                <!-- error message untuk title -->
                                @error('date_of_birth')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Posisi</label>

                                <select name="position" id="position" class="form-control @error('position') is-invalid @enderror">
                                    <option value="">Pilih Posisi</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="Manager">Manager</option>
                                </select>

                                <!-- error message untuk title -->
                                @error('position')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Bank</label>

                                <select name="bank" id="bank" class="form-control @error('bank') is-invalid @enderror">
                                    <option value="">Pilih Bank</option>
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="BCA">BCA</option>
                                    <option value="BRI">BRI</option>
                                </select>

                                <!-- error message untuk title -->
                                @error('bank')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nomor Rekening</label>
                                <input type="number" class="form-control @error('bank_account') is-invalid @enderror" name="bank_account"
                                placeholder="Masukkan Nomor Rekening" required>

                                <!-- error message untuk title -->
                                @error('bank_account')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nomor Telepon</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') }}" placeholder="Masukkan Tanggal Lahir" required>

                                <!-- error message untuk title -->
                                @error('phone')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Alamat</label>

                                <textarea name="address" id="address" cols="5" rows="5" class="form-control @error('address') is-invalid @enderror"
                                placeholder="Alamat Lengkap"></textarea>

                                <!-- error message untuk title -->
                                @error('address')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Provinsi</label>

                                <select name="province" id="province" class="form-control @error('province') is-invalid @enderror">
                                    <option value="">Pilih Provinsi</option>
                                    <option value="Jawa Barat">Jawa Barat</option>
                                    <option value="Jawa Tengah">Jawa Tengah</option>
                                    <option value="Jawa Timur">Jawa Timur</option>
                                </select>

                                <!-- error message untuk title -->
                                @error('province')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kota</label>

                                <select name="city" id="city" class="form-control @error('city') is-invalid @enderror">
                                    <option value="">Pilih Kota</option>
                                    <option value="Bandung">Bandung</option>
                                    <option value="Semarang">Semarang</option>
                                    <option value="Surabaya">Surabaya</option>
                                </select>

                                <!-- error message untuk title -->
                                @error('city')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kode Pos</label>
                                <input type="number" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code"
                                placeholder="Masukkan Kode Pos" required>

                                <!-- error message untuk title -->
                                @error('zip_code')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nomor KTP</label>
                                <input type="number" class="form-control @error('ktp_number') is-invalid @enderror" name="ktp_number"
                                placeholder="Masukkan Nomor KTP" required>

                                <!-- error message untuk title -->
                                @error('ktp_number')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">File KTP</label>
                                <input type="file" class="form-control @error('ktp') is-invalid @enderror" name="ktp">

                                <!-- error message untuk title -->
                                @error('ktp')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>
