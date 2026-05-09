<template>
  <Teleport to="body">
    <Transition name="modal">
      <div v-if="show" class="fixed inset-0 z-[900] flex items-center justify-center p-4" @click.self="$emit('close')">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-[#031632]/80 backdrop-blur-sm"></div>
        <!-- Panel -->
        <div :class="['relative bg-[#fcf9f5] rounded-2xl shadow-2xl w-full overflow-hidden flex flex-col max-h-[90vh]', sizeClass]">
          <!-- Header -->
          <div class="flex items-center justify-between px-6 py-4 border-b border-[#031632]/10 flex-shrink-0">
            <div>
              <h3 class="font-serif text-lg text-[#031632]">{{ title }}</h3>
              <p v-if="subtitle" class="text-[#566252] text-xs mt-0.5">{{ subtitle }}</p>
            </div>
            <button @click="$emit('close')" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-[#031632]/10 text-[#566252] hover:text-[#031632] transition-colors">
              <X class="w-5 h-5" />
            </button>
          </div>
          <!-- Body -->
          <div class="overflow-y-auto flex-1 px-6 py-5">
            <slot />
          </div>
          <!-- Footer -->
          <div v-if="$slots.footer" class="px-6 py-4 border-t border-[#031632]/10 flex-shrink-0 flex items-center justify-end gap-3">
            <slot name="footer" />
          </div>
        </div>
      </div>
    </Transition>
  </Teleport>
</template>

<script setup>
import { computed } from 'vue';
import { X } from 'lucide-vue-next';

const props = defineProps({
  show: Boolean,
  title: { type: String, default: '' },
  subtitle: { type: String, default: '' },
  size: { type: String, default: 'md' },
});

defineEmits(['close']);

const sizeClass = computed(() => ({
  sm: 'max-w-sm',
  md: 'max-w-lg',
  lg: 'max-w-2xl',
  xl: 'max-w-4xl',
}[props.size] || 'max-w-lg'));
</script>

<style scoped>
.modal-enter-active, .modal-leave-active { transition: all 0.25s ease; }
.modal-enter-from, .modal-leave-to { opacity: 0; }
.modal-enter-from .relative, .modal-leave-to .relative { transform: scale(0.96) translateY(8px); }
</style>
