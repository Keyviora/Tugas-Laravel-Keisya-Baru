<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Pelanggan</title>
</head>
<body>
    <h1>Edit Data Pelanggan</h1>

    <form action="{{ route('pelanggan.update', $pelanggan->pelanggan_id) }}"
          method="POST">
        @csrf
        @method('PUT')

        <label>Nama Depan</label>
        <input type="text" name="first_name"
               value="{{ old('first_name', $pelanggan->first_name) }}" required>

        <br><br>

        <label>Nama Belakang</label>
        <input type="text" name="last_name"
               value="{{ old('last_name', $pelanggan->last_name) }}" required>

        <br><br>

        <label>Tanggal Lahir</label>
        <input type="date" name="birthday"
               value="{{ old('birthday', $pelanggan->birthday) }}" required>

        <br><br>

        <label>Jenis Kelamin</label>
        <select name="gender" required>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="Male" {{ old('gender', $pelanggan->gender) == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender', $pelanggan->gender) == 'Female' ? 'selected' : '' }}>Female</option>
            <option value="Other" {{ old('gender', $pelanggan->gender) == 'Other' ? 'selected' : '' }}>Other</option>
        </select>

        <br><br>

        <label>Email</label>
        <input type="email" name="email"
               value="{{ old('email', $pelanggan->email) }}" required>

        <br><br>

        <label>Nomor Telepon</label>
        <input type="text" name="phone"
               value="{{ old('phone', $pelanggan->phone) }}" required>

        <br><br>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('pelanggan.index') }}">Batal</a>
    </form>
</body>
</html>