<template>
 <table>
    <thead>
      <tr>
        <th>id</th>
        <th>nome</th>
        <th>descrição</th>
        <th>ação</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>nome</td>
        <td>descrição</td>
        <td>ação</td>
      </tr>
    </tbody>
  </table>
</template>

<script setup>
import SectionLabel from '~/components/painel/common/SectionLabel.vue';
import { ChartColumn, Plus } from '@lucide/vue'

definePageMeta({
  layout: 'painel',
})
</script>
