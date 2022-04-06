<template>
	<view class="header-start">
		<view class="header-01">
			<view class="my01">
				<image class="img_my" :src="yonghuwx.avatarUrl" />
			</view>
			<view class="my01-t">{{yonghuwx.nickName}}</view>
		</view>
		<button @click="getUserInfo()" class="button">请点击登录</button>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				yonghuwx: []
			}
		},
		methods: {
			getUserInfo() {
				console.log("aaaa")
				uni.getUserProfile({
					desc: 'Wexin', // 这个参数是必须的
					success: res => {
						this.yonghuwx = res.userInfo
						console.log("用户信息", this.yonghuwx)
						this.get()
					}
				})
			},
			get(login){
				console.log(this.yonghuwx.nickName)
				uni.request({
					url:"http://127.0.0.1:3000/users/login",
					data:{
						user:this.yonghuwx.nickName,
						url:this.yonghuwx.avatarUrl
					},
					method:'POST',
					success: (res) => {
						console.log('登录成功')
					}
				})
				uni.switchTab({
					url:"../index/index"
				})
			}
			
		},
	}
</script>

<style>
	.header-start{
		width: 80%;
		/* margin-top: 40%; */
		height: 200px;
		/* background-color: #1CBBB4; */
		margin: 0 auto;
		margin-top: 40%;
	}
	.header-01{
		/* background-color: #39B54A; */
		display: flex;
	}
	.my01 {
		margin-left: 10%;
		height: 200rpx;
		line-height: 200rpx;
		width: 200rpx;
		/* background: #000000; */
	}
	.img_my {
		height: 200rpx;
		width: 200rpx;
		border-radius: 50px;
	}
	.my01-t {
		font-size: 17px;
		margin-left: 50rpx;
		margin-top: 70rpx;
		font-size: 20px;
	}
	.button{
		margin-top: 10px;
		background-color: #FFCE35;
		border: 0px solid white;
	}
</style>
