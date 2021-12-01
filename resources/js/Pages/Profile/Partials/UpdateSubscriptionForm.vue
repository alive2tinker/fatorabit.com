<template>
    <jet-form-section @submitted="updateSubscription">
        <template #title>
            {{ $t("Update Subscription") }}
        </template>

        <template #description>
            {{
                $t(
                    "Browser the offers and choose the package that suits your needs"
                )
            }}
        </template>
        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <div class="flex h-48">
                    <div class="m-auto">
                        <div class="flex justify-center">
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-12 w-12 text-center text-gray-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                            />
                        </svg>
                        </div>
                        <h1 class="text-gray-400">
                            {{
                                $t(
                                    "All subscription types are free at the moment"
                                )
                            }}
                        </h1>
                    </div>
                </div>
            </div>
        </template>
    </jet-form-section>
</template>

<script>
import { defineComponent } from "vue";
import JetActionMessage from "@/Jetstream/ActionMessage.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetFormSection from "@/Jetstream/FormSection.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetLabel from "@/Jetstream/Label.vue";
export default defineComponent({
    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
    },
});
</script>

<style></style>
