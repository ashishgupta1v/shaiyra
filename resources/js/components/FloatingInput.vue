<template>
  <div class="relative w-full mb-6 group">
    <textarea v-if="type === 'textarea'"
      :id="id"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      class="peer w-full bg-transparent border-b-2 border-sage/20 px-0 py-2 pt-6 text-navy placeholder-transparent focus:outline-none focus:border-sage transition-colors resize-none"
      :placeholder="label"
      v-bind="$attrs"
    ></textarea>
    <input v-else
      :type="type"
      :id="id"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      class="peer w-full bg-transparent border-b-2 border-sage/20 px-0 py-2 pt-6 text-navy placeholder-transparent focus:outline-none focus:border-sage transition-colors"
      :placeholder="label"
      v-bind="$attrs"
    />
    <label :for="id"
      class="absolute left-0 top-6 text-sage/50 text-base transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-6 peer-placeholder-shown:text-sage/40 peer-focus:top-0 peer-focus:text-xs peer-focus:text-sage cursor-text"
      :class="{ 'top-0 text-xs text-sage': modelValue }"
    >
      {{ label }}
    </label>
  </div>
</template>

<script setup>
defineProps({
  id: { type: String, required: true },
  label: { type: String, required: true },
  modelValue: { type: [String, Number], default: '' },
  type: { type: String, default: 'text' }
});
defineEmits(['update:modelValue']);
</script>
