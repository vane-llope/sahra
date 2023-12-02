<x-layout>
  <x-form-layout>
      <p class="text-center h1 fw-bold mb-3 mt-4">ویرایش نقش</p>
      <div class="overflow-auto">
      <form method="POST" action="/roles/{{ $role->id }}">
          @csrf
          @method('PUT')
          <div class="d-flex flex-row align-items-center mb-4">
              <div class="form-outline flex-fill mb-0">
                  <input placeholder="نام" type="text" name="name" id="form3Example1c" class="form-control" value="{{ $role->name }}" />
                  @error('name')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
          </div>
          <table class="table">
              @foreach ($entities as $entity)
                  <tbody>
                      <tr>
                          <th scope="row">
                              <label class="form-label" for="form3Example1c">{{ $entity->name }} :</label>
                          </th>
                          <td>
                              <div class="form-check">
                                  <input class="form-check-input" type="hidden" name="permissions[{{ $entity->id }}][create]" value="0">
                                  <input class="form-check-input" type="checkbox" name="permissions[{{ $entity->id }}][create]" value="1" id="create{{ $entity->id }}" {{ $role->permissions->where('entity_id', $entity->id)->first()?->create ? 'checked' : '' }}>
                                  <label class="form-check-label" for="create{{ $entity->id }}">
                                      create
                                  </label>
                              </div>
                          </td>
                          <td>
                              <div class="form-check">
                                  <input class="form-check-input" type="hidden" name="permissions[{{ $entity->id }}][remove]" value="0">
                                  <input class="form-check-input" type="checkbox" name="permissions[{{ $entity->id }}][remove]" value="1" id="remove{{ $entity->id }}" {{ $role->permissions->where('entity_id', $entity->id)->first()?->remove ? 'checked' : '' }}>
                                  <label class="form-check-label" for="remove{{ $entity->id }}">
                                      remove
                                  </label>
                              </div>
                          </td>
                          <td>
                              <div class="form-check">
                                  <input class="form-check-input" type="hidden" name="permissions[{{ $entity->id }}][update]" value="0">
                                  <input class="form-check-input" type="checkbox" name="permissions[{{ $entity->id }}][update]" value="1" id="update{{ $entity->id }}" {{ $role->permissions->where('entity_id', $entity->id)->first()?->update ? 'checked' : '' }}>
                                  <label class="form-check-label" for="update{{ $entity->id }}">
                                      update
                                  </label>
                              </div>
                          </td>
                          <td>
                              <div class="form-check">
                                  <input class="form-check-input" type="hidden" name="permissions[{{ $entity->id }}][display]" value="0">
                                  <input class="form-check-input" type="checkbox" name="permissions[{{ $entity->id }}][display]" value="1" id="display{{ $entity->id }}" {{ $role->permissions->where('entity_id', $entity->id)->first()?->display ? 'checked' : '' }}>
                                  <label class="form-check-label" for="display{{ $entity->id }}">
                                      display
                                  </label>
                              </div>
                          </td>
                      </tr>
                  </tbody>
              @endforeach
          </table>
          <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
              <button type="submit" class="btn btn-danger btn-lg w-100">ثبت</button>
          </div>
      </form>
      </div>
  </x-form-layout>
</x-layout>