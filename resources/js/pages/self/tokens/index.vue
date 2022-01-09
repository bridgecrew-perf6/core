<template>
  <div>
    <nav class="flex items-center mb-8 font-semibold">
      <span class="text-gray-500 ">Self</span>
      <div class="px-3 text-xs text-gray-400"><i class="fas fa-chevron-right"></i></div>
      Tokens
    </nav>

    <div class="w-full">
      <div class="flex flex-col items-start w-full mb-8 overflow-hidden bg-white rounded shadow-sm">
        <div class="w-full px-5 py-4 font-semibold bg-gray-50">
          <div class="flex items-center">
            <h2>Personal access tokens</h2>
            <div class="mx-auto"></div>
            <inertia-link :href="$route('self.tokens.create')" class="inline-block px-4 py-2 text-sm font-semibold text-white transition duration-200 ease-in-out bg-pink-500 rounded hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-opacity-50 focus:ring-pink-500"> <i class="mr-1 opacity-50 fas fa-plus"></i> Create token </inertia-link>
          </div>
        </div>
        <table class="w-full table-fixed">
          <thead>
            <tr class="border-b border-gray-100">
              <th class="px-5 py-3 text-sm font-semibold text-center">Name</th>
              <th class="hidden px-5 py-3 text-sm font-semibold text-center md:table-cell">Created at</th>
              <th class="px-5 py-3 text-sm font-semibold text-center">Last used at</th>
              <th class="px-5 py-3 text-sm font-semibold text-center"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="token in tokens" v-bind:key="token.id" class=" even:bg-gray-50">
              <td class="px-5 py-3 font-semibold">
                <div class="flex flex-row items-center w-full">
                  <div class="truncate">{{ token.name }}</div>
                </div>
              </td>
              <td class="hidden px-5 py-3 text-center truncate md:table-cell">{{ $moment(token.created_at.created_at).format('L') }} {{ $moment(token.created_at.created_at).format('LTS') }}</td>
              <td class="px-5 py-3 text-center truncate">
                <template v-if="token.last_used_at"> {{ $moment(token.last_used_at).format('L') }} {{ $moment(token.last_used_at).format('LTS') }} </template>
                <template v-else>
                  N/A
                </template>
              </td>
              <td class="px-5 py-3 text-right">
                <inertia-link class="inline-block px-4 py-2 text-sm font-semibold text-gray-600 transition duration-200 ease-in-out bg-gray-100 rounded hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-opacity-50 focus:ring-gray-500" :href="$route('self.tokens.delete', token)"><i class="mr-1 opacity-50 fas fa-trash"></i> Delete</inertia-link>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  layout: require('../../../layouts/app').default,

  props: ['tokens'],
};
</script>
