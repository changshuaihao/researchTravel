<template>
	<view class="content">
		<view v-for="(item,index) in list" :key="index" @click="pathchange(item.path,index)">
			<image :src="item.ima_url"></image>
			<view>{{item.title}}</view>
		</view>
	</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				list: []
			}
		},
		methods: {
			pathchange(url, index) {
				// this.title=index
				// this.$emit('myValue',index)
				// console.log(url);
				uni.navigateTo({
					url: url + '?id=' + index
				})
			}
		},
		beforeCreate() {
			console.log('beforeCreate'),
			uni.request({
				url:"http://127.0.0.1:3000/users/mylist",
				success:(res) =>{
					this.list=res.data
					
				}
			})
		}
	}
</script>

<style>
	.content {
		background-color: white;
		margin: 15rpx 0rpx 15rpx 15rpx;
		width: 96%;
		height: 160rpx;
		display: flex;
		flex-direction: row;
		align-items: center;
		justify-content: center;
	}

	.content>view {
		flex: 1;
		font-size: 14px;
		text-align: center;
	}

	.content>view>image {
		width: 84rpx;
		height: 70rpx;
	}
</style>
