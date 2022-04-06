<template>
	<view class="cu-timeline">
		<view class="cu-time">{{router.route}}</view>
		<view class="cu-item cur ">
			<view class="content bg-green shadow-blur">
			{{router[0].route1}}
			</view>
		</view>
		<view class="cu-item text-red ">
			<view class="content bg-red shadow-blur">
				{{router[0].route2}}
			</view>
		</view>
		<view class="cu-item text-grey">
			<view class="content bg-grey shadow-blur">
				{{router[0].route3}}
			</view>
		</view>
		<view class="cu-item text-blue">
			<view class="bg-blue content">
				{{router[0][0].route4}}
			</view>
			<view class="bg-cyan content">
				{{router[0].route5}}
			</view>
		</view>
</view>
</template>

<script>
	export default{
		data(){
			return {
				router:[]
			}
		},
		onLoad() {
			uni.request({
				url:"http://127.0.0.1:3000/users/route_juti",
				success: (res) => {
					this.router = res.data
					console.log(this.router)
				}
			})
		}
	}
</script>

<style>
</style>
