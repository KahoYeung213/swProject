<select {{ $attributes->merge(['class' => 'form-select']) }}>
    @foreach ($courses as $course)
        <option value="{{ $course->id }}" {{ $selected == $course->id ? 'selected' : '' }}>
            {{ $course->course_name }}
        </option>
    @endforeach
</select>
<!-- {{-- Debugging --}}
Selected value: {{ $selected }} -->
