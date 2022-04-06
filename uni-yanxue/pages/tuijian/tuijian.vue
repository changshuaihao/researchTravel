<template>
	<view>
		<view class="cu-card case" :class="isCard?'no-card':''" v-for="(item,index) in tuijian" :key="index">
			<view class="cu-item shadow">
				<view class="image">
					<image class="image01" :src="item.tuijian_img"></image>
					<view class="cu-bar bg-shadeBottom"> <text class="text-cut">{{item.tuijian_name}}</text></view>
				</view>
				<view class="cu-list menu-avatar">
					<view class="cu-item">
						<view class="cu-avatar round lg" >
							<image class="cu-avatar round lg" :src="item.tuijian_url"></image>
						</view>
						<view class="content flex-sub">
							<view class="text-grey">{{item.tuijian_author}}</view>
							<view class="text-gray text-sm flex justify-between">
								{{item.tuijian_time}}
								<view class="text-gray text-sm">
									<text class="cuIcon-attentionfill margin-lr-xs"></text> 10
									<text class="cuIcon-appreciatefill margin-lr-xs"></text> 20
									<text class="cuIcon-messagefill margin-lr-xs"></text> 30
								</view>
							</view>
						</view>
					</view>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				tuijian:[]
			}
		},
		onLoad() {
			uni.request({
				url:"http://127.0.0.1:3000/users/tuijian",
				success: (res) => {
					this.tuijian = res.data
				}
			})
		}
	}
</script>

<style>
	page {
		background-color: #f4f4f4;
		font-size: 32rpx;
	}

	.image01 {
		height: 300rpx;
	}
</style>
