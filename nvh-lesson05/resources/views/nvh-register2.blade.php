<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        label { display: block; margin-top: 10px; }
        .error { color: red; font-size: 0.9em; }
        .success { color: green; font-size: 1.2em; margin-top: 20px; }
    </style>
</head>
<body>
        <h1>Web Training Centre - Registration Form</h1>
        <form action="{{ route('nvhregister2.nvhsubmit2') }}
" method="POST">
            @csrf

            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name') <div class="error">{{ $message }}</div> @enderror

            <label>Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email') <div class="error">{{ $message }}</div> @enderror

            <label>Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="{{ old('dob') }}">
            @error('dob') <div class="error">{{ $message }}</div> @enderror

            <label>Gender:</label>
            <input type="radio" id="male" name="gender" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }}> Male
            <input type="radio" id="female" name="gender" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }}> Female
            @error('gender') <div class="error">{{ $message }}</div> @enderror

            <label>Mobile:</label>
            <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}">
            @error('mobile') <div class="error">{{ $message }}</div> @enderror

            <label>City:</label>
            <select id="city" name="city">
                <option value="">Select</option>
                <option value="New York" {{ old('city') == 'New York' ? 'selected' : '' }}>New York</option>
                <option value="London" {{ old('city') == 'London' ? 'selected' : '' }}>London</option>
                <option value="Mumbai" {{ old('city') == 'Mumbai' ? 'selected' : '' }}>Mumbai</option>
            </select>
            @error('city') <div class="error">{{ $message }}</div> @enderror

            <label>Expertise:</label>
            <input type="checkbox" name="expertise[]" value="HTML" {{ is_array(old('expertise')) && in_array('HTML', old('expertise')) ? 'checked' : '' }}> HTML
            <input type="checkbox" name="expertise[]" value="CSS" {{ is_array(old('expertise')) && in_array('CSS', old('expertise')) ? 'checked' : '' }}> CSS
            <input type="checkbox" name="expertise[]" value="JavaScript" {{ is_array(old('expertise')) && in_array('JavaScript', old('expertise')) ? 'checked' : '' }}> JavaScript
            <input type="checkbox" name="expertise[]" value="jQuery" {{ is_array(old('expertise')) && in_array('jQuery', old('expertise')) ? 'checked' : '' }}> jQuery
            @error('expertise') <div class="error">{{ $message }}</div> @enderror

            <label>Group:</label>
            <select name="group[]" multiple>
                <option value="Family" {{ is_array(old('group')) && in_array('Family', old('group')) ? 'selected' : '' }}>Family</option>
                <option value="Friend" {{ is_array(old('group')) && in_array('Friend', old('group')) ? 'selected' : '' }}>Friend</option>
                <option value="Co-Worker" {{ is_array(old('group')) && in_array('Co-Worker', old('group')) ? 'selected' : '' }}>Co-Worker</option>
                <option value="Neighbour" {{ is_array(old('group')) && in_array('Neighbour', old('group')) ? 'selected' : '' }}>Neighbour</option>
            </select>
            @error('group') <div class="error">{{ $message }}</div> @enderror

            <label>Address:</label>
            <textarea id="address" name="address">{{ old('address') }}</textarea>
            @error('address') <div class="error">{{ $message }}</div> @enderror

            <label>Country:</label>
            <input type="text" id="country" name="country" value="{{ old('country') }}">
            @error('country') <div class="error">{{ $message }}</div> @enderror

            <button type="submit">Save</button>
        </form>
    @if(session('success'))
        <div class="success">
            Congratulations! {{ session('success') }}
        </div>
    @endif
</body>
</html>
