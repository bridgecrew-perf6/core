<template>
  <div>
    <nav class="flex items-center mb-8 font-semibold">
      <span class="text-gray-500 ">Self</span>
      <div class="px-3 text-xs text-gray-400"><i class="fas fa-chevron-right"></i></div>
      <inertia-link :href="$route('self.tokens.index')" class="text-gray-500 hover:underline">Tokens</inertia-link>
      <div class="px-3 text-xs text-gray-400"><i class="fas fa-chevron-right"></i></div>
      <span class="text-gray-500 ">{{ token.name }}</span>
      <div class="px-3 text-xs text-gray-400"><i class="fas fa-chevron-right"></i></div>
      Delete
    </nav>

    <div class="w-full">
      <div class="flex flex-col items-start w-full mb-8 overflow-hidden bg-white rounded shadow-sm">
        <div class="w-full px-5 py-4 font-semibold bg-gray-50">
          Delete token
        </div>
        <form @submit.prevent="submit" class="w-full">
          <div class="w-full px-5 py-4">
            Are you sure ?
          </div>
          <div class="w-full px-5 py-4 text-sm bg-gray-50">
            <div class="flex justify-end">
              <button class="inline-block px-4 py-2 text-sm font-semibold text-gray-600 transition duration-200 ease-in-out bg-gray-200 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-opacity-50 focus:ring-gray-500"><i class="mr-1 opacity-50 fas fa-trash"></i> Delete</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  layout: require('../../../layouts/app').default,

  props: ['token'],

  data() {
    return {
      form: {},
    };
  },

  methods: {
    submit() {
      this.$page.props.errors = {};

      this.$inertia.delete(this.$route('self.tokens.destroy', this.token), { ...this.form });
    },
  },
};
</script>
