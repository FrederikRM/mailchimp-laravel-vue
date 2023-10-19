<template>
    <div>
        <div>
            <input v-model="email" placeholder="Enter your email" />
            <button @click="addToMailchimpList">Subscribe</button>
        </div>
        <button @click="pingMailchimp">Ping Mailchimp</button>

        <button @click="testRoute">Test Route</button>
        <div v-if="response">{{ response }}</div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            email: "", // Input field for email
            response: null,
            status: "subscribed",

        };
    },
    methods: {
        async testRoute() {
            try {
                const response = await axios.get("test");
                this.response = response.data;
            } catch (error) {
                console.error("Error:", error);
            }
        },
        async addToMailchimpList() {
            console.log(this.email, this.status)
            axios.post("/lists/850bacf7f2/members", {
                email: this.email,
                status: this.status,
            })
                .then((response) => {
                    console.log(response.data);
                    console.log(this.email, this.status);
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        async pingMailchimp() {
            try {
                const response = await axios.get("ping");
                console.log("health_status: Everything's Chimpy!", response.data);
            } catch (error) {
                console.error("Error pinging Mailchimp:", error);
            }
        },
    },
};
</script>
